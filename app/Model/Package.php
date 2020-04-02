<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //get owner
    public function owner(){
        return $this->belongsTo('App\Model\Owner', 'owner_id');
    }
    //get car
    public function car(){
        return $this->belongsTo('App\Model\Car', 'car_id');
    }
}
