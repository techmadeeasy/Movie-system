<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = [];
    public function theatres(){
        return $this->hasMany(Theatre::class, "location_id");
    }
}
