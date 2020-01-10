<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function theatres(){
        return $this->hasMany(Theatre::class, "location_id");
    }
}
