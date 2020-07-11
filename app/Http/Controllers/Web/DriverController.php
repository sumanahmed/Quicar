<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    //show all drivers
    public function index(){
        $drivers = Driver::all();
        return view('quicar.backend.driver.index', compact('drivers'));
    }
}
