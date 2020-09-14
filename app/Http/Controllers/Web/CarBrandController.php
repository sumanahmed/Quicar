<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CarBrand;

class CarBrandController extends Controller
{
    //show car brands
    public function index(){
        $brands = CarBrand::all();
        return view('quicar.backend.brand.index', compact('brands'));
    }
}
