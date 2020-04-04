<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\TopDestination;
use Illuminate\Http\Request;

class TopDestinationController extends Controller
{
    //get all top destination
    public function index(){
        $top_destinations = TopDestination::select('id','name','status','image')
                            ->orderBy('id', 'DESC')
                            ->where('status', 1)
                            ->get();
        if($top_destinations->count() > 0){
            return response([
                'status' => 'error',
                'data'   => $top_destinations
            ], 200);
        }else{
            return response([
                'status' => 'error',
                'data'   => []
            ], 404);
        }
    }
}
