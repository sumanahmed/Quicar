<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\CarModel;
use App\Model\CarType;
use Illuminate\Http\Request;
use App\Model\CarYear;
use App\Model\Year;
use Validator;
use Response;

class CarYearController extends Controller
{
    //show car brands
    public function index(){
        $car_years  = CarYear::join('car_types','car_types.id','car_year.car_type_id')
                            ->join('car_model','car_model.id','car_year.car_model_id')
                            ->select('car_year.*','car_types.name as car_type_name','car_model.value as car_model_name')
                            ->get();
        $car_types  = CarType::all();
        $models     = CarModel::all(); 
        return view('quicar.backend.car_year.index', compact('car_years','car_types','models'));
    }

    //show car year create
    public function create(){
        $car_types  = CarType::all();
        $models     = CarModel::all();
        $years      = Year::all();
        return view('quicar.backend.car_year.create', compact('car_types','models','years'));
    }

    //store
    public function store(Request $request){ 
        $validators=Validator::make($request->all(),[
            'name'          => 'required',
            'car_type_id'   => 'required',
            'car_model_id'  => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{ 
            for($i=0; $i < count($request->name); $i++){ 
                $year               = new CarYear();
                $year->value        = Year::find($request->name[$i])->name;
                $year->car_type_id  = $request->car_type_id;
                $year->car_model_id = $request->car_model_id;
                $year->save();
            }
            return redirect()->route('backend.car.year.index')->with('message','Car year created');
        }
    }

    //update
    public function update(Request $request){
        $validators=Validator::make($request->all(),[
            'name'          => 'required',
            'car_type_id'   => 'required',
            'car_model_id'  => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $year               = CarYear::find($request->id);
            $year->value        = $request->name;
            $year->car_type_id  = $request->car_type_id;
            $year->car_model_id = $request->car_model_id;
            if($year->update()){
                $year = CarYear::join('car_types','car_types.id','car_year.car_type_id')
                                ->join('car_model','car_model.id','car_year.car_model_id')
                                ->select('car_year.*','car_types.name as car_type_name','car_model.value as car_model_name')
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
