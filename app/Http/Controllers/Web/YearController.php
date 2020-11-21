<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Year;
use Validator;
use Response;

class YearController extends Controller
{
    //show car brands
    public function index(){
        $years      = Year::all();
        return view('quicar.backend.year.index', compact('years'));
    }

    //store
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'name'          => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $year       = new Year();
            $year->name = $request->name;
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
            'name'   => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $year        = Year::find($request->id);
            $year->name  = $request->name;
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
        $year = Year::find($request->id)->delete();
        return response()->json();
    }
}
