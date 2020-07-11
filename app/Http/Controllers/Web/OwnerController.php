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
}
