<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theatre extends Model
{
    public function films(){
        return $this->hasMany(Film::class);
    }

    public function seatNumbers(){
        return $this->hasManyThrough(Ticket::class, Booking::class, "theatre_id", "booking_id");
    }

}
