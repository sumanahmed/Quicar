<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\HomeOwnerBanner;
use Response;
use Validator;

class HomerOwnerBannerController extends Controller
{
    //show car brands
    public function index(){
        $partner_banners = HomeOwnerBanner::all();
        return view('quicar.backend.banner.owner_banner', compact('partner_banners'));
    }

    //store
    public function store(Request $request){
        $validators=Validator::make($request->all(),[
            'title'     => 'required',
            'img'       => 'required',
            'details'   => 'required',
            'status'    => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }
        $partner_banner         = new HomeOwnerBanner();
        $partner_banner->title  = $request->title;
        $partner_banner->details= $request->details;
        $partner_banner->status   = $request->status;
        if($request->hasFile('img')){
            $image      = $request->file('img');
            $imageName  = time().".".$image->getClientOriginalExtension();
            $directory  = '../mobileapi/asset/banner/';
            $image->move($directory, $imageName);
            $imageUrl   = $directory.$imageName;
            $partner_banner->image_url = $imageUrl;
        }
        if($partner_banner->save()){
            return Response::json([
                'status'    => 201,
                'data'      => $partner_banner
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
            'details'   => 'required',
            'status'    => 'required',
        ]);
        if($validators->fails()){
            return Response::json(['errors'=>$validators->getMessageBag()->toArray()]);
        }
        $partner_banner         = HomeOwnerBanner::find($request->id);
        $partner_banner->title  = $request->title;
        $partner_banner->details= $request->details;
        $partner_banner->status = $request->status;
        if($request->hasFile('img')){
            if(($partner_banner->image_url != null) && file_exists($partner_banner->image_url)){
                unlink($partner_banner->image_url);
            }
            $image      = $request->file('img');
            $imageName  = time().".".$image->getClientOriginalExtension();
            $directory  = '../mobileapi/asset/banner/';
            $image->move($directory, $imageName);
            $imageUrl   = $directory.$imageName;
            $partner_banner->image_url = $imageUrl;
        } 
        if($partner_banner->update()){
            return Response::json([
                'status'    => 201,
                'data'      => $partner_banner
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
        $partner_banner = HomeOwnerBanner::find($request->id);
        if(($partner_banner->image_url != null) && file_exists($partner_banner->image_url)){
            unlink($partner_banner->image_url);
        }
        $partner_banner->delete();
        return response()->json();
    }
}
