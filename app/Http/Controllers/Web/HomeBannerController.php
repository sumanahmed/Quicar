<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\HomeBanner;
use Response;
use Validator;

class HomeBannerController extends Controller
{
    //show car brands
    public function index(){
        $banners = HomeBanner::all();
        return view('quicar.backend.banner.index', compact('banners'));
    }

    //store
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'img'    => 'required',
            'title'  => 'required',
            'des'    => 'required',
            'type'   => 'required',
            'link'   => 'required',
            'status' => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }
        $home_banner         = new HomeBanner();
        $home_banner->title   = $request->title;
        $home_banner->des   = $request->des;
        $home_banner->type   = $request->type;
        $home_banner->link   = $request->link;
        $home_banner->status   = $request->status;
        if($request->hasFile('img')){
            $image      = $request->file('img');
            $imageName  = time().".".$image->getClientOriginalExtension();
            $directory  = '../mobileapi/asset/banner/';
            $image->move($directory, $imageName);
            $imageUrl   = $directory.$imageName;
            $home_banner->img = $imageUrl;
        }
        if($home_banner->save()){
            return Response::json([
                'status'    => 201,
                'data'      => $home_banner
            ]);
        }else{
            return Response::json([
                'status'        => 403,
                'data'          => []
            ]);
        }
    }

    //update
    public function update(Request $request){
        $validators=Validator::make($request->all(),[
            'title'     => 'required',
            'des'       => 'required',
            'type'      => 'required',
            'link'      => 'required',
            'status'    => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }
        $home_banner        = HomeBanner::find($request->id);
        $home_banner->title = $request->title;
        $home_banner->des   = $request->des;
        $home_banner->type  = $request->type;
        $home_banner->link  = $request->link;
        $home_banner->status= $request->status;
        if($request->hasFile('img')){
            if(($home_banner->img != null) && file_exists($home_banner->img)){
                unlink($home_banner->img);
            }
            $image      = $request->file('img');
            $imageName  = time().".".$image->getClientOriginalExtension();
            $directory  = '../mobileapi/asset/banner/';
            $image->move($directory, $imageName);
            $imageUrl   = $directory.$imageName;
            $home_banner->img = $imageUrl;
        } 
        if($home_banner->update()){
            return Response::json([
                'status'    => 201,
                'data'      => $home_banner
            ]);
        }else{
            return Response::json([
                'status'        => 403,
                'data'          => []
            ]);
        }
    }

    //destroy
    public function destroy(Request $request){
        $home_banner = HomeBanner::find($request->id);
        if(($home_banner->img != null) && file_exists($home_banner->img)){
            unlink($home_banner->img);
        }
        $home_banner->delete();
        return response()->json();
    }
}
