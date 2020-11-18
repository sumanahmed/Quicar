<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CarPackage extends Model
{
    //eloquent relation with 
    public function district(){
        return $this->belongsTo('App\Model\CarDistrict','district_id');
    }
}
