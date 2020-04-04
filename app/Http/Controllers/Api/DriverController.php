<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Car;
use App\Model\Driver;
use App\Model\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;

class DriverController extends Controller
{
    //driver register
    public function driverRegister(Request $request) {
        $owner = Owner::select('id')->where('owner_key', $request->api_token)->first();
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

    //car register
    public function carRegister(Request $request){
        $owner = Owner::select('id')->where('owner_key', $request->api_token)->first();
        $car   = Car::where('registration_no', $request->registration_no)->first();
        if($car != null){
            return response()->json([
                'status'    => 'error',
                'data'      => 'This car already registered'
            ],409);
        }else{
            $validator=Validator::make($request->all(),[
                'name'              =>'required|max:111',
                'car_type_id'       =>'required',
                'registration_no'   =>'required',
                'sit_capacity'      =>'required',
                'front_image'       =>'required',
            ]);
            if($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'data'   => 'Sorry, required column missing'
                ],403);
            }else{
                //car store
                $car                    = new Car();
                $car->owner_id          = $owner->id;
                $car->car_type_id       = $request->car_type_id;
                $car->name              = $request->name;
                $car->registration_no   = $request->registration_no;
                $car->sit_capacity      = $request->sit_capacity;
                if($request->front_image){
                    $name           = Str::random(10);
                    $image          = $request->front_image;
                    $decodedImage   = base64_decode("$image");
                    $directory      = "quicar/backend/uploads/images/cars/";
                    file_put_contents($directory.$name.".JPG", $decodedImage);
                    $imageUrl       = $directory.$name.".JPG";
                    $car->front_image    = $imageUrl;
                }
                if($request->inside_image){
                    $name           = Str::random(10);
                    $image          = $request->inside_image;
                    $decodedImage   = base64_decode("$image");
                    $directory      = "quicar/backend/uploads/images/cars/";
                    file_put_contents($directory.$name.".JPG", $decodedImage);
                    $imageUrl       = $directory.$name.".JPG";
                    $car->inside_image    = $imageUrl;
                }
                if($request->back_image){
                    $name           = Str::random(10);
                    $image          = $request->back_image;
                    $decodedImage   = base64_decode("$image");
                    $directory      = "quicar/backend/uploads/images/cars/";
                    file_put_contents($directory.$name.".JPG", $decodedImage);
                    $imageUrl       = $directory.$name.".JPG";
                    $car->back_image    = $imageUrl;
                }
                $car->save();
                if($car->save()){
                    return response()->json([
                        'status'    => 'success',
                        'data'      => 'Car registration successfully'
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

    //get all cars in user app
    public function getCars(){
        $cars = Car::select('id','name','front_image')
                            ->orderBy('id', 'DESC')
                            ->where('status', 1)
                            ->get();
        if($cars->count() > 0){
            return response([
                'status' => 'error',
                'data'   => $cars
            ], 200);
        }else{
            return response([
                'status' => 'error',
                'data'   => []
            ], 404);
        }
    }
}
