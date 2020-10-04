<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\Notification;
use App\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Response;
use Validator;

class UserController extends Controller
{
    //show all users
    public function index(){
        $users = User::all();
        return view('quicar.backend.user.index', compact('users'));
    }

    //status update
    public function statusUpdate(Request $request){ 
        $user                   = User::find($request->user_id);
        $user->account_status   = $request->status;
        $user->update();
        if($user->update()){
            return redirect()->back()->with('message', 'Status update successfully');
        }else{
            return redirect()->back()->with('error_message', 'Sorry something went wrong');
        }
    }

    //notification send
    public function notificationSend(Request $request){ 
        //  http://quicarbd.com//mobileapi/general/notification/send.php
        
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

}
