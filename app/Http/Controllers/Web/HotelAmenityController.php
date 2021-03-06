<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\HotelAmenity;
use Response;
use Validator;

class HotelAmenityController extends Controller
{
    //show city
    public function index(){
        $hotel_amenitys = HotelAmenity::all();
        return view('quicar.backend.hotel_amenity.index', compact('hotel_amenitys'));
    }

    //store
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'name' => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $hotel_amenity           = new HotelAmenity();
            $hotel_amenity->name     = $request->name;
            $hotel_amenity->status   = $request->status;
            if($hotel_amenity->save()){
                return Response::json([
                    'status'    => 201,
                    'data'      => $hotel_amenity
                ]);
            }else{
                return Response::json([
                    'status'    => 403,
                    'data'      => []
                ]);
            }
        }
    }

    //update
    public function update(Request $request){
        $validators=Validator::make($request->all(),[
            'name'=> 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $hotel_amenity           = HotelAmenity::find($request->id);
            $hotel_amenity->name     = $request->name;
            $hotel_amenity->status   = $request->status;
            if($hotel_amenity->update()){
                return Response::json([
                    'status'    => 201,
                    'data'      => $hotel_amenity
                ]);
            }else{
                return Response::json([
                    'status'        => 403,
                    'data'          => []
                ]);
            }
        }
    }

    //destroy
    public function destroy(Request $request){
        $hotel_amenity = HotelAmenity::find($request->id)->delete();
        return response()->json();
    }
}
