<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CarColor;
use Validator;
use Response;

Class CarColorController extends Controller
{
    //show car brands
    public function index(){
        $colors = CarColor::all();
        return view('quicar.backend.color.index', compact('colors'));
    }

    //store
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'name'    => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $color          = new CarColor();
            $color->value   = $request->name;
            if($color->save()){
                return Response::json([
                    'status'    => 201,
                    'data'      => $color
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
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $color          = CarColor::find($request->id);
            $color->value   = $request->name;
            if($color->update()){
                return Response::json([
                    'status'    => 201,
                    'data'      => $color
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
        $color = CarColor::find($request->id)->delete();
        return response()->json();
    }
}
