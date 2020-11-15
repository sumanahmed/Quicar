<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\TourSpot;
use App\Model\CarDistrict;
use Validator;
use Response;

class SpotController extends Controller
{
    //show tour spot
    public function index(){
        $spots      = TourSpot::join('district','district.id','tour_spot.district_id')
                        ->select('tour_spot.*','district.value as district_name')
                        ->get();
        $districts  = CarDistrict::all();
        return view('quicar.backend.spot.index', compact('districts'));
    }

    //store
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'district_id'   => 'required',
            'name'          => 'required',
            'address'       => 'required',
            'image'         => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $spot               = new TourSpot();
            $spot->district_id  = $request->district_id;
            $spot->name         = $request->name;
            $spot->address      = $request->address;
            if($request->image){
                $image          = $request->file('image');
                $image_name     = time().".".$image->getClientOriginalExtension();
                $directory      = '../mobileapi/asset/tour_spot/';
                $image->move($directory, $image_name);
                $image_url      = $directory.$image_name;
                $spot->image    = $image_url;
            }
            if($spot->save()){
                $spot   = TourSpot::join('district','district.id','tour_spot.district_id')
                                    ->select('tour_spot.*','district.value as district_name')
                                    ->where('tour_spot.id', $spot->id)
                                    ->first();
                return Response::json([
                    'status'    => 201,
                    'data'      => $spot
                ]);
            }else{
                return Response::json([
                    'status'        => 403,
                    'data'          => []
                ]);
            }
        }
    }

    //update
    public function update(Request $request){
        $validators=Validator::make($request->all(),[
            'district_id'   => 'required',
            'name'          => 'required',
            'address'       => 'required',
            'image'         => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $spot               = TourSpot::find($request->id);
            $spot->district_id  = $request->district_id;
            $spot->name         = $request->name;
            $spot->address      = $request->address;
            if($request->image){
                if($spot->image != null && file_exists($spot->image)){
                    unlink($spot->image);
                }
                $image          = $request->file('image');
                $image_name     = time().".".$image->getClientOriginalExtension();
                $directory      = '../mobileapi/asset/tour_spot/';
                $image->move($directory, $image_name);
                $image_url      = $directory.$image_name;
                $spot->image    = $image_url;
            }
            if($spot->update()){
                return Response::json([
                    'status'    => 201,
                    'data'      => $spot
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
        $spot = TourSpot::find($request->id);
        if($spot->image != null && file_exists($spot->image)){
            unlink($spot->image);
        }
        $spot->delete();
        return response()->json();
    }
}
