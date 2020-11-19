<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CarModel;
use App\Model\CarType;
use Validator;
use Response;

class CarModelController extends Controller
{
    //show car brands
    public function index(){
        $models = CarModel::join('car_types','car_types.id','car_model.car_type_id')
                            ->select('car_model.*','car_types.name as car_type_name')
                            ->get();
        $car_types = CarType::all();
        return view('quicar.backend.model.index', compact('models','car_types'));
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
            $model          = new CarModel();
            $model->value   = $request->name;
            $model->car_type_id   = $request->car_type_id;
            if($model->save()){
                $model = CarModel::join('car_types','car_types.id','car_model.car_type_id')
                            ->select('car_brand.*','car_types.name as car_type_name')
                            ->where('car_model.id', $model->id)
                            ->first();
                return Response::json([
                    'status'    => 201,
                    'data'      => $model
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
            $model          = CarModel::find($request->id);
            $model->value   = $request->name;
            $model->car_type_id   = $request->car_type_id;
            if($model->update()){
                $model = CarModel::join('car_types','car_types.id','car_model.car_type_id')
                            ->select('car_brand.*','car_types.name as car_type_name')
                            ->where('car_model.id', $model->id)
                            ->first();
                return Response::json([
                    'status'    => 201,
                    'data'      => $model
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
        $model = CarModel::find($request->id)->delete();
        return response()->json();
    }
}
