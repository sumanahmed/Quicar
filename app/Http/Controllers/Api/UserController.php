<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Model\Banner;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //user logout
    public function logout(Request $request){
        $user = User::select('id')->where('user_key', $request->api_token)->first();
        if($user != null){
            $user = User::find($user['id']);
            $user->status = 0;
            $user->update();
            return response()->json([
                'status' => "success",
                'data' => 'User logged out successfully'
            ],200);
        }else{
            return response()->json([
                'status' => "success",
                'data' => 'Sorry, something went wrong'
            ],404);
        }
    }

    //user detail
    public function detail(Request $request){
        $user = User::where('user_key', $request->api_token)->first();
        if($user != null){
            return response()->json(new UserResource($user), 200);
        }else{
            return response([
                'status' => 'error',
                'data' => 'User not found'
            ], 404);
        }
    }

    //get banner for user app
    public function getBanner(Request $request){
        $banners = Banner::select('title','image')->where('banner_for', 1)->get();
        if($banners->count() > 0){
            return response([
                'status' => 'success',
                'data'   => $banners
            ], 200);
        }else{
            return response([
                'status' => 'error',
                'data'   => []
            ], 404);
        }
    }

}
