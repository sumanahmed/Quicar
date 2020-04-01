<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\Upazila;
use App\Model\CarType;
use App\Model\Banner;
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

    //get all banners
    public function getBanner(){
        $banners = Banner::all();
        return view('quicar.backend.banner.banner', compact('banners'));
    }

    //banner create
    public function bannerCreate(){
        return view('quicar.backend.banner.create');
    }

    //banner store
    public function bannerStore(Request $request){
        $this->validate($request,[
            'title'  => 'required',
            'image'  => 'required',
            'status' => 'required',
        ]);
        $banner         = new Banner();
        $banner->title  = $request->title;
        $banner->banner_for = $request->banner_for;
        $banner->status = $request->status;
        if($request->hasFile('image')){
            $image      = $request->file('image');
            $imageName  = time().".".$image->getClientOriginalExtension();
            $directory  = 'quicar/backend/uploads/images/banners/';
            $image->move($directory, $imageName);
            $imageUrl   = $directory.$imageName;
            $banner->image = $imageUrl;
        }
        if($banner->save()){
            return redirect()->route('backend.banner')->with('message','Banner Created Successfully');
        }else{
            return redirect()->route('backend.banner')->with('error_message','Sorry Something Went Wrong');
        }
    }

    //banner Edit
    public function bannerEdit($id){
        $banner = Banner::find($id);
        return view('quicar.backend.banner.edit', compact('banner'));
    }

    //banner update
    public function bannerUpdate(Request $request){
        $this->validate($request,[
            'title'  => 'required',
            'image'  => 'required',
            'status' => 'required',
        ]);
        $banner         = Banner::find($request->banner_id);
        $banner->title  = $request->title;
        $banner->banner_for = $request->banner_for;
        $banner->status = $request->status;
        if($request->hasFile('image')){
            if($banner->image != null){
                unlink($banner->image);
            }
            $image      = $request->file('image');
            $imageName  = time().".".$image->getClientOriginalExtension();
            $directory  = 'quicar/backend/uploads/images/banners/';
            $image->move($directory, $imageName);
            $imageUrl   = $directory.$imageName;
            $banner->image = $imageUrl;
        }
        if($banner->update()){
            return redirect()->route('backend.banner')->with('message','Banner Created Successfully');
        }else{
            return redirect()->route('backend.banner')->with('error_message','Sorry Something Went Wrong');
        }
    }

    //banner delete
    public function bannerDelete(Request $request){
        $banner = Banner::find($request->id);
        unlink($banner->image);
        $banner->delete();
        return response()->json();
    }
}
