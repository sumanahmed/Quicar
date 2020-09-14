<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CarYear;
use Validator;
use Response;

class CarYearController extends Controller
{
    //show car brands
    public function index(){
        $years = CarYear::all();
        return view('quicar.backend.year.index', compact('years'));
    }

    //store
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'name'    => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $year          = new CarYear();
            $year->value   = $request->name;
            if($year->save()){
                return Response::json([
                    'status'    => 201,
                    'data'      => $year
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
            $year          = CarYear::find($request->id);
            $year->value   = $request->name;
            if($year->update()){
                return Response::json([
                    'status'    => 201,
                    'data'      => $year
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
        $year = CarYear::find($request->id)->delete();
        return response()->json();
    }
}
