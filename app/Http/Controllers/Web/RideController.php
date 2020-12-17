<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Ride;
use App\Model\RideList;

class RideController extends Controller
{
    //show current rides
    public function currentRide(){
        $rides = RideList::where('status','!=', 2)->where('status','!=',5)->get();
        return view('quicar.backend.ride.current_ride', compact('rides'));
    }

    //show current ride details
    public function currentRideDetails($ride_id){
        $ride = Ride::find($ride_id);
        return view('quicar.backend.ride.current_ride_details', compact('ride'));
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
