<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\Upazila;
use App\Model\CarType;
use Illuminate\Http\Request;
use Validator;

class AdminController extends Controller
{
    //dashboard
    public function dashboard(){
        return view('quicar.backend.dashboard.dashboard');
    }
    
    //get all car types
    public function carTypes(){
        $car_types = CarType::all();
        return view('quicar.backend.car_types.car_types', compact('car_types'));
    }

    //car types store
    public function carTypesStore(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'monthly_charge'=>'required',
            'admin_commisssion'=>'required',
            'dealer_commisssion'=>'required',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'data' => 'Sorry, required column missing',
                'api_token' => 'Token not found',
            ],403);
        }else{
            $car_type                       = new CarType();
            $car_type->name                 = $request->name;
            $car_type->monthly_charge       = $request->monthly_charge;
            $car_type->admin_commisssion    = $request->admin_commisssion;
            $car_type->dealer_commisssion   = $request->dealer_commisssion;
            $car_type->save();
            return response()->json($car_type);
        }
    }

    //car types update
    public function carTypesUpdate(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'monthly_charge'=>'required',
            'admin_commisssion'=>'required',
            'dealer_commisssion'=>'required',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'data' => 'Sorry, required column missing',
                'api_token' => 'Token not found',
            ],403);
        }else{
            $car_type                       = CarType::find($request->id);
            $car_type->name                 = $request->name;
            $car_type->monthly_charge       = $request->monthly_charge;
            $car_type->admin_commisssion    = $request->admin_commisssion;
            $car_type->dealer_commisssion   = $request->dealer_commisssion;
            $car_type->update();
            return response()->json($car_type);
        }
    }

    //get upazila
    public function getUpazila($id){
        $upazila = Upazila::where('district_id',$id)->get();
        return response()->json($upazila);
    }
}
