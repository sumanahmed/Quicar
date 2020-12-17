<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RideBitting extends Model
{
    protected $table = "ride_biting";

    public function owner() {
        return $this->belongsTo('App\Model\Owner','owner_id');
    }

    public function ride() {
        return $this->belongsTo('App\Model\RideList','ride_id');
    }

    public function driver() {
        return $this->belongsTo('App\Model\Driver','driver_id');
    }

    public function car() {
        return $this->belongsTo('App\Model\Car','car_id');
    }
}
