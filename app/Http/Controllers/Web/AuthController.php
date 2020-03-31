<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    // admin login page
    public function login(){
        return view('quicar.backend.auth.login');
    }

    // log the admin in
    public function signin(Request $request){
        $admin = Admin::select('type')->where('email', $request->email)->first();
        if($admin != null && $admin['type'] == 1){
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('backend.dashboard')->with('message','Successfully loggedin !');
            }else{
                return redirect()->route('backend.admin.login')->with('error_message','Email/Password is wrong !');;
            }
        }else{
            return redirect()->route('backend.admin.login')->with('error_message','You are not admin');;
        }
    }

    // backend admin log out
    public function logout(Request $request){
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        }
        return redirect()->route('backend.admin.login');
    }
}
