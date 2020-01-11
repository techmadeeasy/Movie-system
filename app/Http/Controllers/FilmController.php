<?php

namespace App\Http\Controllers;


use App\Film;
use App\Http\Requests\BookTickets;
use App\Location;
use App\ShowTime;
use Carbon\Carbon;


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
        $time = new Carbon;
        return view("viewfilm", compact("film","cinemas", "showing_times", "time"));
    }


}
