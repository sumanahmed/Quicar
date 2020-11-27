<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HotelPackage extends Model
{
    protected $table = "hotel_packages";

    public function district(){
        return $this->belongsTo('App\Model\CarDistrict','district_id');
    }

    public function city(){
        return $this->belongsTo('App\Model\City','city_id');
    }
}
