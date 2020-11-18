<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\Car;
use App\Model\CarDistrict;
use App\Model\CarPackage;
use App\Model\Owner;
use App\Model\TourSpot;
use Illuminate\Http\Request;

class CarPackageController extends Controller
{
    /**
     * show car packages
     */
    public function index(){
        $car_packages = CarPackage::all();
        return view('quicar.backend.car_package.index', compact('car_packages'));
    }

    /**
     * show car packages create page
     */
    public function create(){
        $districts = CarDistrict::all();
        $owners = Owner::all();
        return view('quicar.backend.car_package.create', compact('districts','owners'));
    }

    /**
     * car packages store
     */
    public function store(Request $request){
        $car_packge                     = new CarPackage();
        $car_packge->name               = $request->name;
        $car_packge->details            = $request->details;
        $car_packge->district           = CarDistrict::find($request->district_id)->value;
        $car_packge->district_id        = $request->district_id;
        $car_packge->spot_id            = json_encode($request->spot_id);
        $car_packge->starting_location  = $request->starting_location;
        $car_packge->owner_id           = $request->owner_id;
        $car_packge->duration           = $request->duration;
        $car_packge->total_person       = $request->total_person;
        $car_packge->facilities         = $request->facilities;
        $car_packge->price              = $request->price;
        $car_packge->status             = 0;
        $car_packge->status_message     = $request->status_message;
        $car_packge->owner_get          = $request->owner_get;
        $car_packge->car_id             = $request->car_id;
        $car_packge->quicar_charge      = $request->quicar_charge;
        $car_packge->terms_condition    = $request->terms_condition;
        if($car_packge->save()){
            return redirect()->route('backend.car.package.index')->with('message','Car package added successfully');
        }else{
            return redirect()->back()->with('error_message','Sorry, something went wrong');
        }
    }

    /**
     * show tour spot by district_id
     */
    public function districtSpot($district_id){ 
        $spots  = TourSpot::select('id','name')->where('district_id',$district_id)->get();
        return response()->json($spots);
    }

    /**
     * show car by owner_id
     */
    public function getCar($owner_id){ 
        $cars  = Car::select('id','carRegisterNumber')->where('owner_id',$owner_id)->where('status', 1)->get();
        return response()->json($cars);
    }

    
    /**
     * show car packages edit page
     */
    public function edit($id){
        $car_package= CarPackage::find($id);
        $districts  = CarDistrict::all();
        $owners     = Owner::all();
        $spots      = TourSpot::select('id','name')->where('district_id',$car_package->district_id)->get();
        $cars       = Car::select('id','carRegisterNumber')->where('owner_id',$car_package->owner_id)->where('status', 1)->get();
        return view('quicar.backend.car_package.edit', compact('car_package','districts','owners','spots','cars'));
    }

    
    /**
     * car packages store
     */
    public function update(Request $request, $id){
        $car_packge                     = CarPackage::find($id);
        $car_packge->name               = $request->name;
        $car_packge->details            = $request->details;
        $car_packge->district_id        = $request->district_id;
        $car_packge->spot_id            = json_encode($request->spot_id);
        $car_packge->starting_location  = $request->starting_location;
        $car_packge->owner_id           = $request->owner_id;
        $car_packge->duration           = $request->duration;
        $car_packge->total_person       = $request->total_person;
        $car_packge->facilities         = $request->facilities;
        $car_packge->price              = $request->price;
        $car_packge->status             = $request->status;
        $car_packge->status_message     = $request->status_message;
        $car_packge->owner_get          = $request->owner_get;
        $car_packge->car_id             = $request->car_id;
        $car_packge->quicar_charge      = $request->quicar_charge;
        $car_packge->terms_condition    = $request->terms_condition;
        if($car_packge->save()){
            return redirect()->route('backend.car.package.index')->with('message','Car package updated successfully');
        }else{
            return redirect()->back()->with('error_message','Sorry, something went wrong');
        }
    }

    /**
     * delete car package
     */
    public function destroy($id){
        $car_package = CarPackage::find($id)->delete();
        return redirect()->route('backend.car.package.index')->with('message','Car package deleted successfully');
    }

}
