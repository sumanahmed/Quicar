<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Package\PackageResource;
use App\Model\Owner;
use App\Model\Package;
use Illuminate\Http\Request;
use Validator;

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

    //package store
    public function store(Request $request){
        $owner = Owner::select('id')->where('owner_key', $request->api_token)->first();
        $validator=Validator::make($request->all(),[
            'car_id'  => 'required',
            'name'    => 'required',
            'price'   => 'required',
            'type'    => 'required',
            'start'   => 'required',
            'end'     => 'required',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'data'   => 'Sorry, required column missing'
            ],403);
        }else{
            $package            = new Package();
            $package->owner_id  = $owner->id;
            $package->car_id    = $request->car_id;
            $package->name      = $request->name;
            $package->price     = $request->price;
            $package->type      = $request->type;
            $package->start     = date('Y-m-d H:i:s', strtotime($request->start));
            $package->end       = date('Y-m-d H:i:s', strtotime($request->end));
            if($package->save()){
                return response([
                    'status' => 'success',
                    'data'   => new PackageResource($package)
                ],201);
            }else{
                return response([
                    'status' => 'error',
                    'data'   => []
                ], 403);
            }
        }
    }

}
