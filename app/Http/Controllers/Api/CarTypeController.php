<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\CarType;
use Illuminate\Http\Request;

class CarTypeController extends Controller
{
    //get all car types
    public function getCarTypes(){
        $car_types = CarType::all();
        if($car_types->count() > 0){
            return response()->json([
                'status'    => 'success',
                'data'      => $car_types
            ],200);
        }else{
            return response()->json([
                'status'    => 'error',
                'data'      => []
            ],404);
        }
    }
}
