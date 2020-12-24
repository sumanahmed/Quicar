<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\Upazila;
use App\Model\CarType;
use App\Model\Banner;
use App\Model\Car;
use App\Model\Complain;
use App\Model\Driver;
use App\Model\Owner;
use App\Model\Package;
use App\Model\Ride;
use App\Model\TopDestination;
use App\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Validator;
use Response;

class AdminController extends Controller
{
    //dashboard
    public function dashboard(){
        $data['total_user'] = User::count();
        $data['active_user'] = User::where('account_status', 1)->count();
        $data['inactive_user'] = User::where('account_status', 0)->count();
        $data['total_partner'] = Owner::count();
        $data['active_partner'] = Owner::where('account_status', 1)->count();
        $data['inactive_partner'] = Owner::where('account_status', 0)->count();
        $data['total_driver'] = Driver::count();
        $data['pending_driver'] = Driver::where('account_status', 0)->count();
        $data['active_driver'] = Driver::where('account_status', 1)->count();
        $data['total_car'] = Car::count();
        $data['total_inactive_car'] = Car::where('verify', 0)->count();
        $data['total_active_car'] = Car::where('verify', 1)->count();
        $data['total_expired_car'] = 0;
        $data['total_ride'] = Ride::count();
        $data['total_complete_ride'] = Ride::where('status', 4)->count();
        $data['total_pending_ride'] = Ride::where('status', 2)->count();
        $data['total_current_ride'] = Car::where('verify', 1)->count();        
        $data['total_schedule_ride'] = Ride::where('ride_type', 2)->count();
        $data['total_package_ride'] = Ride::where('ride_type', 4)->count();
        $data['total_package'] = Package::count();
        $data['total_active_package'] = Package::where('status', 1)->count();
        $data['total_pending_package'] = Package::where('status', 0)->count();
        $data['total_income'] = Ride::where('status', 4)->sum('amount');
        $data['total_cancel_ride'] = Ride::where('status', 5)->count();
      
        return view('quicar.backend.dashboard.dashboard', $data);
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

    //show owner complain page
    public function ownerComplainList(){
        $complains = Complain::join('owners','owners.id','report_list.owner_id')
                            ->select('report_list.*','owners.name as owner_name','owners.phone as owner_phone')
                            ->orderBy('id','desc')
                            ->get();
        return view('quicar.backend.complain.index',compact('complains'));
    }

    //show sms notification send page
    public function smsNotification(){
        return view('quicar.backend.sms_notification.index');
    }

    //send sms notification
    public function smsNotificationSend(Request $request){
        $validators=Validator::make($request->all(),[
            'for'   => 'required',
            'status'   => 'required',
            'title'   => 'required',
            'message' => 'required',
            'notification' => 'required',
        ]);

        if($request->for == 1){
            $users = User::where('account_status', $request->status)->get();                             
            foreach($users as $user){
                if($request->notification == 1){
                    $this->sendNotification($user->n_key, $request->title, $request->message);
                }else{
                    $this->sendSmsNotification($user->n_key, $request->title, $request->message, $user->phone);
                }
            }
        }else{
            $owners = Owner::where('account_status', $request->status)->get();
            foreach($owners as $owner){
                if($request->notification == 1){                 
                    $this->sendNotification($owner->n_key, $request->title, $request->message);
                }else{
                    $this->sendSmsNotification($owner->n_key, $request->title, $request->message, $owner->phone);                    
                }                
            }
        }   
        return redirect()->back()->with('message','Notification send successfully');
    }

    //send notification
    public function sendNotification($n_key, $title, $message){
        $id      = $n_key;
        $title   = $title;
        $body    = $message;
        $client  = new Client();
        $client->request("GET", "http://quicarbd.com//mobileapi/general/notification/send.php?id=".$id."&title=".$title ."&body=".$body);
    }

    //send sms & push notification
    public function sendSmsNotification($n_key, $title, $message, $phone){
        //push notification send            
            $id      = $n_key;
            $title   = $title;
            $body    = $message;
            $client  = new Client();
            $client->request("GET", "http://quicarbd.com//mobileapi/general/notification/send.php?id=".$id."&title=".$title ."&body=".$body);
        //push notification send end

        //message send
            $msg    = $message;
            $client = new Client();            
            $sms    = $client->request("GET", "http://66.45.237.70/api.php?username=01670168919&password=TVZMBN3D&number=". $phone ."&message=".$msg);
        //message send end
    }

}
