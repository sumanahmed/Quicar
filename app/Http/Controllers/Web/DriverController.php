<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\Driver;
use App\Model\Owner;
use Illuminate\Http\Request;
use Validator;
use Response;

class DriverController extends Controller
{
    //show all drivers
    public function index(){
        $drivers = Driver::all();
        $owners  = Owner::select('id','name','api_token')->where('account_status', 1)->get();   
        return view('quicar.backend.driver.index', compact('drivers','owners'));
    }

    //driver store
    public function store(Request $request){ 
        $validators=Validator::make($request->all(),[
            'name'      => 'required',
            'phone'     => 'required',
            'dob'       => 'required',
            'owner_id'  => 'required',
            'nid'       => 'required',
            'division'  => 'required',
            'district'  => 'required',
            'address'   => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $driver            = new Driver();
            $driver->name      = $request->name;
            $driver->email     = $request->email ? $request->email : Null;
            $driver->phone     = $request->phone;
            $driver->dob       = $request->dob;
            $driver->owner_id  = $request->owner_id;
            $driver->nid       = $request->nid;
            $driver->division  = $request->division;
            $driver->district  = $request->district;
            $driver->address   = $request->address;
            $driver->date      = date('Y-m-d');
            $driver->time      = date('H:i:s');      
            if($request->license){
                $license        = $request->file('license');
                $license_name   = time().".".$license->getClientOriginalExtension();
                $directory      = '../mobileapi/asset/driver/license/';
                $license->move($directory, $license_name);
                $license_url    = $directory.$license_name;
                $driver->license= $license_url;
            }
            if($request->image){
                $image          = $request->file('image');
                $image_name     = time().".".$image->getClientOriginalExtension();
                $directory      = '../mobileapi/asset/driver/profile/';
                $image->move($directory, $image_name);
                $image_url      = $directory.$image_name;
                $driver->img    = $image_url;
            }
            if($driver->save()){
                return Response::json([
                    'status'    => 201,
                    'data'      => $driver
                ]);
            }else{
                return Response::json([
                    'status'    => 403,
                    'data'      => []
                ]);
            }
        }
    }
    
    //update driver
    public function update(Request $request){ 
        $validators=Validator::make($request->all(),[
            'name'      => 'required',
            'phone'     => 'required',
            'dob'       => 'required',
            'owner_id'  => 'required',
            'nid'       => 'required',
            'division'  => 'required',
            'district'  => 'required',
            'address'   => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $driver            = Driver::find($request->id);
            $driver->name      = $request->name;
            $driver->email     = $request->email ? $request->email : Null;
            $driver->phone     = $request->phone;
            $driver->dob       = $request->dob;
            $driver->owner_id  = $request->owner_id;
            $driver->nid       = $request->nid;
            $driver->division  = $request->division;
            $driver->district  = $request->district;
            $driver->address   = $request->address;
            $driver->date      = date('Y-m-d');
            $driver->time      = date('H:i:s');      
            if($request->license){
                if($driver->license != null && file_exists($driver->license)){
                    unlink($driver->license);
                }
                $license        = $request->file('license');
                $license_name   = time().".".$license->getClientOriginalExtension();
                $directory      = '../mobileapi/asset/driver/license/';
                $license->move($directory, $license_name);
                $license_url    = $directory.$license_name;
                $driver->license= $license_url;
            }
            if($request->image){
                if($driver->image != null && file_exists($driver->image)){
                    unlink($driver->image);
                }
                $image          = $request->file('image');
                $image_name     = time().".".$image->getClientOriginalExtension();
                $directory      = '../mobileapi/asset/driver/profile/';
                $image->move($directory, $image_name);
                $image_url      = $directory.$image_name;
                $driver->img    = $image_url;
            }
            if($driver->update()){
                return Response::json([
                    'status'    => 201,
                    'data'      => $driver
                ]);
            }else{
                return Response::json([
                    'status'    => 403,
                    'data'      => []
                ]);
            }
        }
    }
    
    //destroy driver
    public function destroy(Request $request){
        $driver = Driver::find($request->id);
        if(($driver->image != null) && file_exists($driver->image)){
            unlink($driver->image);
        }   
        if(($driver->license != null) && file_exists($driver->license)){
            unlink($driver->license);
        }
        $driver->delete();
        return Response::json([
            'status'  => 200,
            'message' => 'Driver deleted'
        ]);
    }
}
