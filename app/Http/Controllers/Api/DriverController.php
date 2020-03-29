<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Driver;
use App\Model\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;

class DriverController extends Controller
{
    //driver register
    public function driverRegister(Request $request) {
        $owner = Owner::select()->where('owner_key', $request->api_token)->first();
        $driver = Driver::where('phone', $request->phone)->first();
        if($driver != null){
            return response()->json([
                'status'    => 'error',
                'data'      => 'You have already registered',
                'api_token' => 'Token not found'
            ],409);
        }else{
            $validator=Validator::make($request->all(),[
                'name'      =>'required|max:111',
                'phone'     =>'required|unique:drivers|max:14|min:11',
                'address'   =>'required',
                'license_number'   =>'required',
            ]);
            if($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'data' => 'Sorry, required column missing',
                    'api_token' => 'Token not found',
                ],403);
            }else{
                //driver store
                $driver                 = new Driver();
                $driver->owner_id       = $owner->id;
                $driver->name           = $request->name;
                $driver->phone          = $request->phone;
                $driver->address        = $request->address;
                $driver->license_number = $request->license_number;
                $driver->save();
                if($driver->save()){
                    return response()->json([
                        'status'    => 'success',
                        'data'      => 'Driver registration successfully'
                    ],201);
                }else{
                    return response()->json([
                        'status'    => 'error',
                        'data'      => 'Something went wrong'
                    ], 403);
                }
            }
        }
    }
}
