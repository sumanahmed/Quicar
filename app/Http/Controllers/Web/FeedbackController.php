<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Feedback;
use App\Http\Lib\Helper;
use App\Model\Owner;
use Validator;
use Response;

class FeedbackController extends Controller
{
    //show all feedback
    public function index(){
        $feedbacks = Feedback::all();
        return view('quicar.backend.feedback.index', compact('feedbacks'));
    }

    //feedback reply
    public function reply(Request $request){
        $helper = new Helper();
        $validators=Validator::make($request->all(),[
            'replay' => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $feedback = Feedback::find($request->id);

            $id     = Owner::find($feedback->owner_id)->n_key;
            $title  = 'Feedback Reply';            
            $msg    = $request->replay;
            $helper->sendSingleNotification($id, $title, $msg);
            
            $feedback->replay   = $request->replay;
            if($feedback->update()){
                return Response::json([
                    'status'    => 201,
                    'data'      => $feedback
                ]);
            }else{
                return Response::json([
                    'status'        => 403,
                    'data'          => []
                ]);
            }
        }
    }

    //feedback destroy
    public function destroy(Request $request){
        $feedback = Feedback::find($request->id)->delete();
        return response()->json();
    }
}
