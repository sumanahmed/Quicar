<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CarBrand;
use Validator;
use Response;

class CarBrandController extends Controller
{
    //show car brands
    public function index(){
        $brands = CarBrand::all();
        return view('quicar.backend.brand.index', compact('brands'));
    }

    //store
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'name'    => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }else{
            $brand          = new CarBrand();
            $brand->value   = $request->name;
            if($brand->save()){
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


    //destroy
    public function destroy(Request $request){
        $vat = CarBrand::find($request->id)->delete();
        return response()->json();
    }
}
