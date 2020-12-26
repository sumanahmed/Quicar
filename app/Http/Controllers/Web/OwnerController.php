<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\CarDistrict;
use App\Model\Owner;
use App\Model\City;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Response;
use Validator;

class OwnerController extends Controller
{
    //show all owners
    public function index(){
        $owners = Owner::all();
        return view('quicar.backend.owner.index', compact('owners'));
    }

    //show owner create page
    public function create(){
        $districts = CarDistrict::select()->orderBy('id','DESC')->get();        
        $citys  = City::all();
        return view('quicar.backend.owner.create',compact('districts','citys'));
    }

    //store owner
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'nid' => 'required',
            'district' => 'required',
            'city' => 'required',
            'area' => 'required',
        ]);

        $owner = new Owner();
        $owner->name = $request->name;
        $owner->email = $request->email;
        $owner->phone = $request->phone;
        $owner->dob = $request->dob;
        $owner->nid = $request->nid;
        $owner->district = $request->district;
        $owner->city = $request->city;
        $owner->area = $request->area;
        if($request->hasFile('img')){
            $image      = $request->file('img');
            $imageName  = time().".".$image->getClientOriginalExtension();
            $directory  = '../mobileapi/asset/owner/';
            $image->move($directory, $imageName);
            $imageUrl   = $directory.$imageName;
            $owner->img = $imageUrl;
        }

        if($owner->save()) {
            return redirect()->route('backend.owner.index')->with('message', 'Partner created successfully');
        }else{
            return redirect()->back()->with('error_message', 'Sorry something went wrong');
        }
    }

    //edit owner page
    public function edit($id){
        $owner  = Owner::find($id);        
        $citys  = City::all();
        $districts = CarDistrict::select()->orderBy('id','DESC')->get();
        return view('quicar.backend.owner.edit',compact('owner','citys','districts'));
    }

    //store owner
    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'nid' => 'required',
            'district' => 'required',
            'city' => 'required',
            'area' => 'required',
        ]);

        $owner = Owner::find($id);
        $owner->name = $request->name;
        $owner->email = $request->email;
        $owner->phone = $request->phone;
        $owner->dob = $request->dob;
        $owner->nid = $request->nid;
        $owner->district = $request->district;
        $owner->account_status = $request->account_status;
        $owner->city = $request->city;
        $owner->area = $request->area;
        $owner->bidding_percent = $request->bidding_percent;
        $owner->car_package_charge = $request->car_package_charge;
        $owner->hotel_package_charge = $request->hotel_package_charge;
        $owner->travel_package_charge = $request->travel_package_charge;
        if($request->hasFile('img')){
            if(($owner->img != null) && file_exists($owner->img)){
                unlink($owner->img);
            }

            $image      = $request->file('img');
            $imageName  = time().".".$image->getClientOriginalExtension();
            $directory  = '../mobileapi/asset/owner/';
            $image->move($directory, $imageName);
            $imageUrl   = $directory.$imageName;
            $owner->img = $imageUrl;
        }

        if($owner->update()) {
            return redirect()->route('backend.owner.index')->with('message', 'Partner updated successfully');
        }else{
            return redirect()->back()->with('error_message', 'Sorry something went wrong');
        }
    }

    //status update
    public function statusUpdate(Request $request){ 
        $owner                   = Owner::find($request->owner_id);
        $owner->account_status   = $request->status;
        $owner->update();
        if($owner->update()){
            return redirect()->back()->with('message', 'Status update successfully');
        }else{
            return redirect()->back()->with('error_message', 'Sorry something went wrong');
        }
    }

    //notification send
    public function notificationSend(Request $request){         
        $validators=Validator::make($request->all(),[
            'title'   => 'required',
            'message' => 'required',
            'notification' => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{ 
            if($request->notification == 1){ 
                //push notification send            
                    $id      = $request->n_key;
                    $title   = $request->title;
                    $body    = $request->message;
                    $client  = new Client();
                    $client->request("GET", "http://quicarbd.com//mobileapi/general/notification/send.php?id=".$id."&title=".$title ."&body=".$body);
                //push notification send end
                return Response::json([
                    'status'    => 200,
                    'message'   => "Notification send successfully",
                ]);
            }else{
                //push notification send            
                    $id      = $request->n_key;
                    $title   = $request->title;
                    $body    = $request->message;
                    $client  = new Client();
                    $client->request("GET", "http://quicarbd.com//mobileapi/general/notification/send.php?id=".$id."&title=".$title ."&body=".$body);
                //push notification send end

                //message send
                    $msg    = $request->message;
                    $client = new Client();            
                    $sms    = $client->request("GET", "http://66.45.237.70/api.php?username=01670168919&password=TVZMBN3D&number=". $request->phone ."&message=".$msg);
                //message send end
                return Response::json([
                    'status'    => 200,
                    'message'   => "Notification & SMS send successfully",
                ]);
            }            
        }        
    }

    //owner details
    public function details($owner_id){
        $owner        = Owner::where('id',$owner_id)->first();
        $total_ride   = \App\Model\Ride::where('owner_id', $owner_id)->count('id');
        $total_complete   = \App\Model\Ride::where('owner_id', $owner_id)->where('status',4)->count('id');
        $total_cancel = \App\Model\Ride::where('owner_id', $owner_id)->where('status',5)->count('id');
        $total_spend  = \App\Model\OwnerAccount::where('owner_id', $owner_id)->where('type',0)->sum('amount');
        return view('quicar.backend.owner.details', compact('owner','total_ride','total_complete','total_cancel','total_spend'));
    }
}
