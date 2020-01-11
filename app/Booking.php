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
        return $this->belongsTo(Location::class);
    }

    public function showTime(){
        return $this->belongsTo(ShowTime::class, "showtime_id");
    }

    public function theatre(){
        return $this->belongsTo(Theatre::class, "theatre_id");
    }
}
