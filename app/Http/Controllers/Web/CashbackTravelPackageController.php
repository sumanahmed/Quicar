<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\TravelPackage;
use Illuminate\Http\Request;

class CashbackTravelPackageController extends Controller
{
    /**
     * show cashback travel packages
     */
    public function index(Request $request){
        $travel_packages = TravelPackage::join('owners','owners.id','travel_packages.owner_id')
                                    ->select('owners.name as owner_name','owners.phone as owner_phone','travel_packages.*')
                                    ->when(request('phone'), function ($q) {  
                                        return $q->where('owners.phone', request('phone'));
                                    })
                                    ->when(request('tour_name'), function ($q) {  
                                        return $q->where('travel_packages.tour_name', request('name'));
                                    })
                                    ->where('travel_packages.cash_back_status', 2)
                                    ->get();
        return view('quicar.backend.cashback.travel_package', compact('travel_packages'));
    }
}
