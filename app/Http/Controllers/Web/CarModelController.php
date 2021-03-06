<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\CarBrand;
use Illuminate\Http\Request;
use App\Model\CarModel;
use App\Model\CarType;
use Validator;
use Response;

class CarModelController extends Controller
{
    //show car brands
    public function index(Request $request){ 
        $models     = CarModel::join('car_types','car_types.id','car_model.car_type_id')
                            ->join('car_brand','car_brand.id','car_model.car_brand_id')
                            ->select('car_model.*','car_types.name as car_type_name','car_brand.value as car_brand_name')
                            ->when(request('filter_car_type_id'), function ($query) {
                                $query->where('car_model.car_type_id', request('filter_car_type_id'));
                            })
                            ->when(request('filter_car_brand_id'), function ($query) {
                                $query->where('car_model.car_brand_id', request('filter_car_brand_id'));
                            })
                            ->get();
        $car_types  = CarType::all();
        $brands     = CarBrand::all();
        $filter_car_type_id = isset($request->filter_car_type_id) ? $request->filter_car_type_id : 0;
        $filter_car_brand_id = isset($request->filter_car_brand_id) ? $request->filter_car_brand_id : 0;
        if($filter_car_type_id != 0){
            $filter_car_brands = CarBrand::where('car_type_id',$filter_car_type_id)->get();
        }
        return view('quicar.backend.model.index', compact('models','car_types','brands','filter_car_type_id','filter_car_brand_id','filter_car_brands'));
    }

    //store
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'name'          => 'required',
            'car_type_id'   => 'required',
            'car_brand_id'  => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $model              = new CarModel();
            $model->value       = $request->name;
            $model->car_type_id = $request->car_type_id;
            $model->car_brand_id= $request->car_brand_id;
            if($model->save()){
                $model = CarModel::join('car_types','car_types.id','car_model.car_type_id')
                            ->join('car_brand','car_brand.id','car_model.car_brand_id')
                            ->select('car_model.*','car_types.name as car_type_name','car_brand.value as car_brand_name')
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
            'name'          => 'required',
            'car_type_id'   => 'required',
            'car_brand_id'  => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $model              = CarModel::find($request->id);
            $model->value       = $request->name;
            $model->car_type_id = $request->car_type_id;
            $model->car_brand_id= $request->car_brand_id;
            if($model->update()){
                $model = CarModel::join('car_types','car_types.id','car_model.car_type_id')
                                ->join('car_brand','car_brand.id','car_model.car_brand_id')
                                ->select('car_model.*','car_types.name as car_type_name','car_brand.value as car_brand_name')
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

    //get car brand
    public function getBrand($car_type_id){
        $car_brand = CarBrand::select('id','value as name')->where('car_type_id', $car_type_id)->get();
        if($car_brand->count() > 0){
            return Response::json([
                'status'    => 200,
                'data'      => $car_brand
            ]);
        }else{
            return Response::json([
                'status'    => 403,
                'data'      => []
            ]);
        }
    }
}
