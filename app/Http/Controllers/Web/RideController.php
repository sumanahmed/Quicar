<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Ride;

class RideController extends Controller
{
    //show current rides
    public function currentRide(){
        $rides = Ride::where('ride_type', 1)->get();
        return view('quicar.backend.ride.current_ride', compact('rides'));
    }

    //show current rides
    public function scheduleRide(){
        $rides = Ride::where('ride_type', 2)->get();
        return view('quicar.backend.ride.schedule_ride', compact('rides'));
    }

    //show current rides
    public function ambulanceRide(){
        $rides = Ride::where('ride_type', 3)->get();
        return view('quicar.backend.ride.ambulance_ride', compact('rides'));
    }

    //show current rides
    public function packageRide(){
        $rides = Ride::where('ride_type', 4)->get();
        return view('quicar.backend.ride.package_ride', compact('rides'));
    }
}
