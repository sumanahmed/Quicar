<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Owner\OwnerResource;
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

    //owner detail
    public function detail(Request $request){
        $owner = Owner::where('owner_key', $request->api_token)->first();
        if($owner != null){
            return response([
                'status' => 'success',
                'data'   => new OwnerResource($owner)
            ], 200);
        }else{
            return response([
                'status' => 'error',
                'data'   => []
            ], 404);
        }
    }
}
