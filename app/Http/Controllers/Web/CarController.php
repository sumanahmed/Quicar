<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\Car;
use App\Model\CarYear;
use App\Model\CarModel;
use App\Model\CarBrand;
use App\Model\CarClass;
use App\Model\CarColor;
use App\Model\CarDistrict;
use Illuminate\Http\Request;

class CarController extends Controller
{
    //show all cars
    public function index(){
        $cars = Car::join('owners','owners.api_token','cars.owner_id')
                    ->join('drivers','drivers.id','cars.driver_id')
                    ->select('cars.id','cars.name','cars.img1','cars.c_status','owners.name as owner_name',
                            'owners.phone as owner_phone','drivers.name as driver_name','drivers.phone as driver_phone',
                            'drivers.c_status as driver_current_status','drivers.license','drivers.nid','drivers.account_status'
                            )
                    ->get();
        return view('quicar.backend.car.index', compact('cars'));
    }

    //show edit page
    public function edit($id){
        $car        = Car::find($id);
        $years      = CarYear::all();
        $models     = CarModel::all();
        $brands     = CarBrand::all();
        $classes    = CarClass::all();
        $colors     = CarColor::all();
        $districts  = CarDistrict::all();
        return view('quicar.backend.car.edit', compact('car','years','models','brands','classes','colors','districts'));
    }
}
