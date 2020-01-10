<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function showtime(){
        return $this->hasOne(ShowTime::class);
    }
}
