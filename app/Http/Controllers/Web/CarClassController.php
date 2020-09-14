<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CarClass;
use Validator;
use Response;

class CarClassController extends Controller
{
    //show car brands
    public function index(){
        $classes = CarClass::all();
        return view('quicar.backend.class.index', compact('classes'));
    }

    //store
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'name'    => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $class          = new CarClass();
            $class->value   = $request->name;
            if($class->save()){
                return Response::json([
                    'status'    => 201,
                    'data'      => $class
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
            $class          = CarClass::find($request->id);
            $class->value   = $request->name;
            if($class->update()){
                return Response::json([
                    'status'    => 201,
                    'data'      => $class
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
        $class = CarClass::find($request->id)->delete();
        return response()->json();
    }
}
