<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = [];

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }

    public function film(){
        return $this->belongsTo(Film::class);
    }

    public function location(){
        return $this->hasOne(Location::class);
    }
}
