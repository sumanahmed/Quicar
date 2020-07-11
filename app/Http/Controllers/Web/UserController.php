<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //show all owners
    public function index(){
        $users = User::all();
        return view('quicar.backend.user.index', compact('users'));
    }
}
