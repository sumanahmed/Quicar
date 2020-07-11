<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    //show all cars
    public function index(){
        $cars = Car::all();
        return view('quicar.backend.car.index', compact('cars'));
    }
}
