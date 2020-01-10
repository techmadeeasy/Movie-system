<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $guarded = [];
    public function showtime(){
        return $this->hasOne(ShowTime::class);
    }
}
