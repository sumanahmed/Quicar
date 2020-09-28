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
}
