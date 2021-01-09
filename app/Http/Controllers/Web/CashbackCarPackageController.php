<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CarPackage;

class CashbackCarPackageController extends Controller
{
    /**
     * show cashback car packages
     */
    public function index(Request $request){
        $car_packages = CarPackage::join('owners','owners.id','car_packages.owner_id')
                                    ->select('owners.name as owner_name','owners.phone as owner_phone','car_packages.*')
                                    ->when(request('phone'), function ($q) {  
                                        return $q->where('owners.phone', request('phone'));
                                    })
                                    ->when(request('name'), function ($q) {  
                                        return $q->where('car_packages.name', request('name'));
                                    })
                                    ->where('car_packages.cash_back_status', 2)
                                    ->get();
        return view('quicar.backend.cashback.car_package', compact('car_packages'));
    }
}
