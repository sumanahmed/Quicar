<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\CarType;
use Illuminate\Http\Request;
use App\Model\CarYear;
use Validator;
use Response;

class CarYearController extends Controller
{
    //show car brands
    public function index(){
        $years = CarYear::join('car_types','car_types.id','car_year.car_type_id')
                            ->select('car_year.*','car_types.name as car_type_name')
                            ->get();
        $car_types = CarType::all();
        return view('quicar.backend.year.index', compact('years','car_types'));
    }

    //store
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'name'    => 'required',
            'car_type_id'    => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $year          = new CarYear();
            $year->value   = $request->name;
            $year->car_type_id   = $request->car_type_id;
            if($year->save()){
                $year = CarYear::join('car_types','car_types.id','car_year.car_type_id')
                            ->select('car_brand.*','car_types.name as car_type_name')
                            ->where('car_year.id', $year->id)
                            ->first();
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
            'car_type_id'    => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $year          = CarYear::find($request->id);
            $year->value   = $request->name;
            $year->car_type_id   = $request->car_type_id;
            if($year->update()){
                $year = CarYear::join('car_types','car_types.id','car_year.car_type_id')
                            ->select('car_brand.*','car_types.name as car_type_name')
                            ->where('car_year.id', $year->id)
                            ->first();
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
