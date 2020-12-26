<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Ride;
use App\Model\RideBitting;
use App\Model\RideList;

class RideController extends Controller
{
    //show current rides
    public function currentRide(){
        $rides = RideList::where('status','!=', 2)->where('status','!=',5)->get();
        return view('quicar.backend.ride.current_ride', compact('rides'));
    }

    //show ride bitting
    public function rideBitting($ride_id) {
        $ride_bittings = RideBitting::where('ride_id',$ride_id)->get();
        return view('quicar.backend.ride.ride_bitting', compact('ride_bittings'));
    }

    //bidding Destroy
    public function bittingDestroy($bitting_id) {
        $ride_bitting = RideBitting::where('id',$bitting_id);
        if($ride_bitting->delete()){
            return redirect()->back()->with('message','Bitting deleted successfully');
        }else{
            return redirect()->back()->with('error_message','Sorry, something went wrong');
        }
    }

    //show current ride details
    public function currentRideDetails($ride_id){
        $ride = Ride::find($ride_id);
        return view('quicar.backend.ride.current_ride_details', compact('ride'));
    }

    //show complete rides
    public function completeRide(){ 
        $rides = Ride::where('status', 5)->get();
        return view('quicar.backend.ride.complete_ride', compact('rides'));
    }

    //show cancel rides
    public function cancelRide(){
        $rides = Ride::where('status', 2)->get();
        return view('quicar.backend.ride.cancel_ride', compact('rides'));
    }

    //show package rides
    public function packageRide(){
        $rides = Ride::where('ride_type', 4)->get();
        return view('quicar.backend.ride.package_ride', compact('rides'));
    }
}
