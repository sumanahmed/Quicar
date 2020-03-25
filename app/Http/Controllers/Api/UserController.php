<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
}
