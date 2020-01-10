<?php

namespace App\Http\Controllers;

use App\Film;
use App\Location;
use App\ShowTime;
use App\Theatre;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    //Films currently showing in all locations
    public function nowShowing(){
        $films = Film::take(2)->get();
        return view("welcome", compact( "films"));
    }

    //view a single film now showing
    public function viewNowShowing($id){
        $film = Film::findorfail($id);
        $cinemas = Location::take(2)->get();
        $showing_times = ShowTime::take(4)->get();
        return view("viewfilm", compact("film","cinemas", "showing_times"));
    }

}
