<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CarModel;
use Validator;
use Response;

class CarModelController extends Controller
{
    //show car brands
    public function index(){
        $models = CarModel::all();
        return view('quicar.backend.model.index', compact('models'));
    }

    //store
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'name'    => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $model          = new CarModel();
            $model->value   = $request->name;
            if($model->save()){
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
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $model          = CarModel::find($request->id);
            $model->value   = $request->name;
            if($model->update()){
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
