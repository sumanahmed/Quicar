<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\Owner;
use Illuminate\Http\Request;

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
}
