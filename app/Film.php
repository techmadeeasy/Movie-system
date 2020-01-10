<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    public function theatre(){
        return $this->belongsTo(Theatre::class);
    }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
