<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CarColor;
use App\Model\CarType;
use Validator;
use Response;

Class CarColorController extends Controller
{
    //show car brands
    public function index(){
        $colors = CarColor::join('car_types','car_types.id','car_color.car_type_id')
                            ->select('car_color.*','car_types.name as car_type_name')
                            ->get();
        $car_types = CarType::all();
        return view('quicar.backend.color.index', compact('colors','car_types'));
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
            $color          = new CarColor();
            $color->value   = $request->name;
            $color->car_type_id   = $request->car_type_id;
            if($color->save()){
                $color = CarColor::join('car_types','car_types.id','car_color.car_type_id')
                            ->select('car_color.*','car_types.name as car_type_name')
                            ->where('car_color', $color->id)
                            ->first();
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
            'car_type_id'    => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $color          = CarColor::find($request->id);
            $color->value   = $request->name;
            $color->car_type_id   = $request->car_type_id;
            if($color->update()){
                $color = CarColor::join('car_types','car_types.id','car_color.car_type_id')
                            ->select('car_color.*','car_types.name as car_type_name')
                            ->where('car_color', $color->id)
                            ->first();
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
