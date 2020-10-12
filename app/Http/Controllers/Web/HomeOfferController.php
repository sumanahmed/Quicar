<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\HomeOffer;
use Response;
use Validator;

class HomeOfferController extends Controller
{
    //show car brands
    public function index(){
        $offers = HomeOffer::all();
        return view('quicar.backend.offer.index', compact('offers'));
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
        $home_offer         = new HomeOffer();
        $home_offer->title  = $request->title;
        $home_offer->des    = $request->des;
        $home_offer->type   = $request->type;
        $home_offer->link   = $request->link;
        $home_offer->status = $request->status;
        if($request->hasFile('img')){
            $image      = $request->file('img');
            $imageName  = time().".".$image->getClientOriginalExtension();
            $directory  = '../mobileapi/asset/offer/';
            $image->move($directory, $imageName);
            $imageUrl   = $directory.$imageName;
            $home_offer->img = $imageUrl;
        }
        if($home_offer->save()){
            return Response::json([
                'status'    => 201,
                'data'      => $home_offer
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
        $home_offer        = HomeOffer::find($request->id);
        $home_offer->title = $request->title;
        $home_offer->des   = $request->des;
        $home_offer->type  = $request->type;
        $home_offer->link  = $request->link;
        $home_offer->status= $request->status;
        if($request->hasFile('img')){
            if(($home_offer->img != null) && file_exists($home_offer->img)){
                unlink($home_offer->img);
            }
            $image      = $request->file('img');
            $imageName  = time().".".$image->getClientOriginalExtension();
            $directory  = '../mobileapi/asset/offer/';
            $image->move($directory, $imageName);
            $imageUrl   = $directory.$imageName;
            $home_offer->img = $imageUrl;
        } 
        if($home_offer->update()){
            return Response::json([
                'status'    => 201,
                'data'      => $home_offer
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
        $home_offer = HomeOffer::find($request->id);
        if(($home_offer->img != null) && file_exists($home_offer->img)){
            unlink($home_offer->img);
        }
        $home_offer->delete();
        return response()->json();
    }
}
