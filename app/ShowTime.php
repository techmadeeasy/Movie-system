<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowTime extends Model
{
   public function films(){
       return $this->hasMany(Film::class);
   }
}
