<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\HomePackage;
use App\Model\Package;
use Response;
use Validator;

class PackageController extends Controller
{
    //show car brands
    public function index(){
        $packages = Package::leftjoin('home_package','home_package.pac_id','packages.id')
                            ->select('packages.*','home_package.pac_id as home_package_id')
                            ->get();
        return view('quicar.backend.package.index', compact('packages'));
    }

    //package add or remove to home package
    public function addRemove(Request $request){
        if($request->status == 0){
            HomePackage::where('pac_id', $request->id)->delete();
            return Response::json([
                'status'  => 403,
                'message' => 'Package removed from home package successfully'
            ]);
        }else{
            $home_package           = new HomePackage();
            $home_package->pac_id   = $request->id;
            $home_package->title    = $request->title;
            $home_package->des      = $request->des;
            $home_package->save();
            return Response::json([
                'status'  => 200,
                'message' => 'Package added to home package successfully'
            ]);
        }
    }

    //destroy
    public function destroy(Request $request){
        $package        = Package::find($request->id)->first();
        $home_package   = HomePackage::where('pac_id', $request->id)->first();
        if($home_package != null){
            return Response::json([
                'status'  => 403,
                'message' => 'Sorry, this package used in Home Package'
            ]);
        }else{
            if(($package->img != null) && file_exists($package->img)){
                unlink($package->img);
            }
            $package->delete();
            return Response::json([
                'status'  => 200,
                'message' => 'Package deleted successfully'
            ]);
        }        
    }
}
