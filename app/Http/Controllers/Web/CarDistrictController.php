<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CarDistrict;
use Validator;
use Response;

class CarDistrictController extends Controller
{
    //show car brands
    public function index(){
        $districts = CarDistrict::all();
        return view('quicar.backend.district.index', compact('districts'));
    }

    //store
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'name'    => 'required',
            'bn_name' => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $district          = new CarDistrict();
            $district->value   = $request->name;
            $district->bn_name = $request->bn_name;
            if($district->save()){
                return Response::json([
                    'status'    => 201,
                    'data'      => $district
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
            'name'    => 'required',
            'bn_name' => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $district          = CarDistrict::find($request->id);
            $district->value   = $request->name;
            $district->bn_name = $request->bn_name;
            if($district->update()){
                return Response::json([
                    'status'    => 201,
                    'data'      => $district
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
        $district = CarDistrict::find($request->id)->delete();
        return response()->json();
    }
}
