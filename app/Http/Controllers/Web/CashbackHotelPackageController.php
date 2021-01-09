<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\HotelPackage;
use Illuminate\Http\Request;

class CashbackHotelPackageController extends Controller
{
    /**
     * show cashback hotel packages
     */
    public function index(Request $request){
        $hotel_packages = HotelPackage::join('owners','owners.id','hotel_packages.owner_id')
                                    ->select('owners.name as owner_name','owners.phone as owner_phone','hotel_packages.*')
                                    ->when(request('phone'), function ($q) {  
                                        return $q->where('owners.phone', request('phone'));
                                    })
                                    ->when(request('hotel_name'), function ($q) {  
                                        return $q->where('hotel_packages.hotel_name', request('hotel_name'));
                                    })
                                    ->where('hotel_packages.cash_back_status', 2)
                                    ->get();
        return view('quicar.backend.cashback.hotel_package', compact('hotel_packages'));
    }
}
