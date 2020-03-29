<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    //get all packages
    public function index(Request $request){
        if($request->sort != null){
            $sort = $request->sort;
        }else{
            $sort = "desc";
        }
        $packages = Package::orderBy('id', $sort)->get();
        if($packages != null){
            return response([
                'status' => 'error',
                'data'   => $packages
            ], 200);
        }else{
            return response([
                'status' => 'error',
                'data'   => []
            ], 404);
        }
    }
}
