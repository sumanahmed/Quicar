<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CarBrand;
use App\Model\CarType;
use Validator;
use Response;

class CarBrandController extends Controller
{
    //show car brands
    public function index(){
        $brands = CarBrand::join('car_types','car_types.id','car_brand.car_type_id')
                            ->select('car_brand.*','car_types.name as car_type_name')
                            ->get();
        $car_types = CarType::all();
        return view('quicar.backend.brand.index', compact('brands','car_types'));
    }

    //store
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'name'      => 'required',
            'car_type_id'    => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $brand          = new CarBrand();
            $brand->value   = $request->name;
            $brand->car_type_id   = $request->car_type_id;
            if($brand->save()){
                $brand = CarBrand::join('car_types','car_types.id','car_brand.car_type_id')
                            ->select('car_brand.*','car_types.name as car_type_name')
                            ->where('car_brand.id', $brand->id)
                            ->first();
                return Response::json([
                    'status'    => 201,
                    'data'      => $brand
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
            $brand          = CarBrand::find($request->id);
            $brand->value   = $request->name;
            $brand->car_type_id   = $request->car_type_id;
            if($brand->update()){
                $brand = CarBrand::join('car_types','car_types.id','car_brand.car_type_id')
                            ->select('car_brand.*','car_types.name as car_type_name')
                            ->where('car_brand.id', $brand->id)
                            ->first();
                return Response::json([
                    'status'    => 201,
                    'data'      => $brand
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
        $brand = CarBrand::find($request->id)->delete();
        return response()->json();
    }
}
