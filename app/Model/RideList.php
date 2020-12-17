<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RideList extends Model
{
    protected $table = "ride_list";

    public function district() {
        return $this->belongsTo('App\Model\CarDistrict','starting_district');
    }

    public function city() {
        return $this->belongsTo('App\Model\City','starting_city');
    }

    public function destinationDistrict() {
        return $this->belongsTo('App\Model\CarDistrict','destination_district');
    }

    public function destinationCity() {
        return $this->belongsTo('App\Model\City','destination_city');
    }
}
