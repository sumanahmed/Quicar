<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    //show all cars
    public function index(){
        $cars = Car::join('owners','owners.api_token','cars.owner_id')
                    ->select('cars.id','cars.name','cars.img1','cars.c_status','owners.name as owner_name',
                            'owners.phone as owner_phone')
                    ->get();
        return view('quicar.backend.car.index', compact('cars'));
    }
}
