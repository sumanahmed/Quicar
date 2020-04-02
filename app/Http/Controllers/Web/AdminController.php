<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\Upazila;
use App\Model\CarType;
use App\Model\Banner;
use App\Model\Package;
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

    //car types create
    public function carTypesCreate(){
        return view('quicar.backend.car_types.create');
    }

    //car types store
    public function carTypesStore(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'bn_name'=>'required',
            'image'=>'required',
        ]);
        $car_type            = new CarType();
        $car_type->name      = $request->name;
        $car_type->bn_name   = $request->bn_name;
        if($request->hasFile('image')){
            $image      = $request->file('image');
            $imageName  = time().".".$image->getClientOriginalExtension();
            $directory  = 'quicar/backend/uploads/images/car_types/';
            $image->move($directory, $imageName);
            $imageUrl   = $directory.$imageName;
            $car_type->image = $imageUrl;
        }
        if($car_type->save()){
            return redirect()->route('backend.car_types')->with('message','Car Type Created Successfully');
        }else{
            return redirect()->route('backend.car_types')->with('error_message','Sorry Something Went Wrong');
        }
    }

    //car types edit
    public function carTypesEdit($id){
        $car_type = CarType::find($id);
        return view('quicar.backend.car_types.edit',compact('car_type'));
    }

    //car types update
    public function carTypesUpdate(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'bn_name'=>'required'
        ]);
        $car_type            = CarType::find($request->car_type_id);
        $car_type->name      = $request->name;
        $car_type->bn_name   = $request->bn_name;
        if($request->hasFile('image')){
            if($car_type->image != null){
                unlink($car_type->image);
            }
            $image      = $request->file('image');
            $imageName  = time().".".$image->getClientOriginalExtension();
            $directory  = 'quicar/backend/uploads/images/car_types/';
            $image->move($directory, $imageName);
            $imageUrl   = $directory.$imageName;
            $car_type->image = $imageUrl;
        }
        if($car_type->update()){
            return redirect()->route('backend.car_types')->with('message','Car Type Updated Successfully');
        }else{
            return redirect()->route('backend.car_types')->with('error_message','Sorry Something Went Wrong');
        }
    }

    //car type delete
    public function carTypesDelete(Request $request){
        $car_type = CarType::find($request->id);
        unlink($car_type->image);
        $car_type->delete();
        return response()->json();
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
            'banner_for'  => 'required',
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
            'banner_for'  => 'required',
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

    //get packages
    public function package(){
        $packages = Package::all();
        return view('quicar.backend.package.package', compact('packages'));
    }
}
