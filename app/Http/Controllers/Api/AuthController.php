<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use App\Model\Owner;
use App\Model\Profile;
use App\Model\Referrel;
use App\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Str;
use Auth;

class AuthController extends Controller
{
    //user register
    public function userRegister(Request $request) {
        $user = User::where('phone', $request->phone)->first();
        if($user != null){
            return response()->json([
                'status'    => 'error',
                'data'      => 'You have already registered',
                'api_token' => 'Token not found'
            ],409);
        }else{
            $validator=Validator::make($request->all(),[
                'name'  => 'required|max:111',
                'phone' => 'required|unique:users|max:14|min:11'
            ]);
            if($validator->fails()) {
                return response()->json([
                    'status'    => 'error',
                    'data'      => 'Sorry, required column missing',
                    'api_token' => 'Token not found',
                ],403);
            }
            $user               = new User();
            $user->name         = $request->name;
            $user->email        = $request->email ? $request->email : NULL;
            $user->phone        = $request->phone;
            $user->password     = bcrypt(123456);
            $user->user_key     = $user->createToken('QuicarApi')->accessToken;
            $user->status       = 1;
            if($request->image){
                $name           = Str::random(10);
                $image          = $request->image;
                $decodedImage   = base64_decode("$image");
                $directory      = "quicar/backend/images/users/";
                file_put_contents($directory.$name.".JPG", $decodedImage);
                $imageUrl       = $directory.$name.".JPG";
                $user->image    = $imageUrl;
            }
            $user->save();
            //referrel store
            if($request->referrel_phone){
                $get_user                   = User::select('id')->where('phone', $request->referrel_phone)->first();
                if($get_user != null){
                    $user_referrel_amount = Profile::find(1)->user_referrel_amount;
                    //referrel store
                    $referrel                   = new Referrel();
                    $referrel->referrel_phone   = $request->referrel_phone;
                    $referrel->user_id          = $user->id;
                    $referrel->amount           = $user_referrel_amount;
                    $referrel->save();
                    //user point update
                    $update_user                    = User::find($get_user['id']);
                    $update_user->referrel_income   = ($get_user->referrel_income + $user_referrel_amount);
                    $update_user->update();
                }
            }
            $msg    = "Dear ". $user->name .", Welcome to Quicar, you have successfully registered as a user.";
            $client = new Client();
            $sms    = $client->request("GET", "http://66.45.237.70/api.php?username=01670168919&password=TVZMBN3D&number=". $user->phone ."&message=".$msg);
            $sms_status_code = $sms->getStatusCode();
            if($sms_status_code == 200){
                return response()->json([
                    'status'    => 'success',
                    'data'      => 'User registration successfully',
                    'api_token' => $user->user_key
                ],201);
            }else{
                return response()->json([
                    'status'    => 'error',
                    'data'      => 'Something went wrong',
                    'api_token' => 'Token not found'
                ], 403);
            }
        }
    }

    //user login
    public function userLogin(Request $request){
        $user = User::where('phone', $request->phone)->first();
        if($user == null){
            return response()->json([
                'status'    => 'error',
                'data'      => 'You not yet registered',
                'api_token' => "Token not found"
            ],409);
        }else{
            if(Auth::attempt(['phone'=>$request->phone, 'password'=>'123456'])) {
                $user = Auth::user();
                $user->status = 1;
                $user->update();
                return response()->json([
                    'status'    => 'success',
                    'data'      => 'You are logged in',
                    'api_token' => $user->user_key
                ],201);
            } else{
                return response()->json([
                    'status'    => 'error',
                    'data'      => 'Failed',
                    'api_token' => "Token not found"
                ],404);
            }
        }
    }

    //owner register
    public function ownerRegister(Request $request) {
        $owner = Owner::where('phone', $request->phone)->first();
        if($owner != null){
            return response()->json([
                'status'    => 'error',
                'data'      => 'You have already registered',
                'api_token' => 'Token not found'
            ],409);
        }else{
            $validator=Validator::make($request->all(),[
                'name'  =>'required|max:111',
                'phone' =>'required|unique:owners|max:14|min:11',
            ]);
            if($validator->fails()) {
                return response()->json([
                    'status'    => 'error',
                    'data'      => 'Sorry, required column missing',
                    'api_token' => 'Token not found',
                ],403);
            }else{
                //owner store
                $owner               = new Owner();
                $owner->name         = $request->name;
                $owner->email        = $request->email ? $request->email : "abc@gmail.com";
                $owner->phone        = $request->phone;
                $owner->password     = bcrypt(654321);
                $owner->owner_key   = $owner->createToken('QuicarApi')->accessToken;
                $owner->status       = 1;
                if($request->image){
                    $name           = Str::random(10);
                    $image          = $request->image;
                    $decodedImage   = base64_decode("$image");
                    $directory      = "quicar/backend/images/owners/";
                    file_put_contents($directory.$name.".JPG", $decodedImage);
                    $imageUrl       = $directory.$name.".JPG";
                    $owner->image    = $imageUrl;
                }
                $owner->save();
                //referrel store
                if($request->referrel_phone){
                    $get_owner = owner::select('id')->where('phone', $request->referrel_phone)->first();
                    if($get_owner != null){
                        $owner_referrel_amount      = Profile::find(1)->owner_referrel_amount;
                        //referrel store
                        $referrel                   = new Referrel();
                        $referrel->referrel_phone   = $request->referrel_phone;
                        $referrel->owner_id         = $owner->id;
                        $referrel->amount           = $owner_referrel_amount;
                        $referrel->save();
                        //owner referrel income update
                        $update_owner                    = User::find($get_owner['id']);
                        $update_owner->referrel_income   = ($get_owner->referrel_income + $owner_referrel_amount);
                        $update_owner->update();
                    }
                }
                $msg    = "Dear ". $owner->name .", Welcome to Quicar, you have successfully registered as a owner.";
                $client = new Client();
                $sms    = $client->request("GET", "http://66.45.237.70/api.php?username=01670168919&password=TVZMBN3D&number=". $owner->phone ."&message=".$msg);
                $sms_status_code = $sms->getStatusCode();
                if($sms_status_code == 200){
                    return response()->json([
                        'status'    => 'success',
                        'data'      => 'Owner registration successfully',
                        'api_token' => $owner->owner_key
                    ],201);
                }else{
                    return response()->json([
                        'status'    => 'error',
                        'data'      => 'Something went wrong',
                        'api_token' => 'Token not found'
                    ], 403);
                }
            }
        }
    }

    //owner login
    public function ownerLogin(Request $request){
        $owner = Owner::where('phone', $request->phone)->first();
        if($owner == null){
            return response()->json([
                'status'    => 'error',
                'data'      => 'You not yet registered',
                'api_token' => "Token not found"
            ],409);
        }else{
            if (Auth::guard('owner')->attempt(['phone' => $request->phone, 'password' => '654321'])) {
                $owner = Auth::guard('owner')->user();
                $owner->status = 1;
                $owner->update();
                return response()->json([
                    'status'    => 'success',
                    'data'      => 'You are logged in',
                    'api_token' => $owner->owner_key
                ],201);
            } else{
                return response()->json([
                    'status'    => 'error',
                    'data'      => 'Failed',
                    'api_token' => "Token not found"
                ],404);
            }
        }
    }
}
