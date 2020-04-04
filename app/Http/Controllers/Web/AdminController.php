<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\Upazila;
use App\Model\CarType;
use App\Model\Banner;
use App\Model\Package;
use App\Model\TopDestination;
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

    //package edit
    public function packageEdit($id){
        $package = Package::find($id);
        return view('quicar.backend.package.edit', compact('package'));
    }

    //package update
    public function packageUpdate(Request $request){
        $this->validate($request,[
            'name'   => 'required',
            'price'  => 'required',
            'type'   => 'required',
            'status' => 'required',
        ]);
        $package         = Package::find($request->package_id);
        $package->name   = $request->name;
        $package->price  = $request->price;
        $package->type   = $request->type;
        $package->status = $request->status;
        if($request->hasFile('image')){
            if($package->image != null){
                unlink($package->image);
            }
            $image      = $request->file('image');
            $imageName  = time().".".$image->getClientOriginalExtension();
            $directory  = 'quicar/backend/uploads/images/packages/';
            $image->move($directory, $imageName);
            $imageUrl   = $directory.$imageName;
            $package->image = $imageUrl;
        }
        if($package->update()){
            return redirect()->route('backend.package')->with('message','Package Updated Successfully');
        }else{
            return redirect()->route('backend.package')->with('error_message','Sorry Something Went Wrong');
        }
    }

    //package delete
    public function packageDelete(Request $request){
        $package = Package::find($request->id);
        if($package->image != null){
            unlink($package->image);
        }
        $package->delete();
        return response()->json();
    }

    //get top destination
    public function topDestination(){
        $top_destinations = TopDestination::select('id','name','image')
                                            ->orderBy('id', 'DESC')
                                            ->get();
        return view('quicar.backend.top_destination.top_destination', compact('top_destinations'));
    }

    //get top destination create
    public function topDestinationCreate(){
        return view('quicar.backend.top_destination.create');
    }

    //get top destination store
    public function topDestinationStore(Request $request){
        $this->validate($request,[
            'name'  => 'required',
            'image'  => 'required',
            'status' => 'required',
        ]);
        $top_destination    = new TopDestination();
        $top_destination->name       = $request->name;
        $top_destination->status     = $request->status;
        if($request->hasFile('image')){
            $image      = $request->file('image');
            $imageName  = time().".".$image->getClientOriginalExtension();
            $directory  = 'quicar/backend/uploads/images/top_destination/';
            $image->move($directory, $imageName);
            $imageUrl   = $directory.$imageName;
            $top_destination->image = $imageUrl;
        }
        if($top_destination->save()){
            return redirect()->route('backend.top-destination')->with('message','Top Destination Created Successfully');
        }else{
            return redirect()->route('backend.top-destination')->with('error_message','Sorry Something Went Wrong');
        }
    }

    //get top destination edit
    public function topDestinationEdit($id){
        $top_destination    = TopDestination::find($id);
        return view('quicar.backend.top_destination.edit',compact('top_destination'));
    }

    //get top destination update
    public function topDestinationUpdate(Request $request){
        $this->validate($request,[
            'name'  => 'required',
            'status' => 'required',
        ]);
        $top_destination    = TopDestination::find($request->top_destination_id);
        $top_destination->name       = $request->name;
        $top_destination->status     = $request->status;
        if($request->hasFile('image')){
            if($top_destination->image != null){
                unlink($top_destination->image);
            }
            $image      = $request->file('image');
            $imageName  = time().".".$image->getClientOriginalExtension();
            $directory  = 'quicar/backend/uploads/images/top_destination/';
            $image->move($directory, $imageName);
            $imageUrl   = $directory.$imageName;
            $top_destination->image = $imageUrl;
        }
        if($top_destination->save()){
            return redirect()->route('backend.top-destination')->with('message','Top Destination Created Successfully');
        }else{
            return redirect()->route('backend.top-destination')->with('error_message','Sorry Something Went Wrong');
        }
    }

    //top destination delete
    public function topDestinationDelete(Request $request){
        $top_destination = TopDestination::find($request->id);
        if($top_destination->image != null){
            unlink($top_destination->image);
        }
        $top_destination->delete();
        return response()->json();
    }
}
