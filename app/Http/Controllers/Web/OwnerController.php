<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\Owner;
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
        $owner        = Owner::where('api_token',$owner_id)->first();
        $total_ride   = \App\Model\Ride::where('owner_id', $owner_id)->count('id');
        $total_complete   = \App\Model\Ride::where('owner_id', $owner_id)->where('status',4)->count('id');
        $total_cancel = \App\Model\Ride::where('owner_id', $owner_id)->where('status',5)->count('id');
        $total_spend  = \App\Model\OwnerAccount::where('user_id', $owner_id)->where('type',0)->sum('amount');
        return view('quicar.backend.owner.details', compact('owner','total_ride','total_complete','total_cancel','total_spend'));
    }
}
