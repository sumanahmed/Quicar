<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    //owner logout
    public function logout(Request $request){
        $owner = Owner::select('id')->where('owner_key', $request->api_token)->first();
        if($owner != null){
            $owner = Owner::find($owner['id']);
            $owner->status = 0;
            $owner->update();
            return response()->json([
                'status' => "success",
                'data' => 'Owner logged out successfully'
            ],200);
        }else{
            return response()->json([
                'status' => "success",
                'data' => 'Sorry, something went wrong'
            ],404);
        }
    }
}
