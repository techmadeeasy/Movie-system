<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Film;
use App\Http\Requests\BookTickets;
use App\Http\Requests\BookTicketsRequest;
use App\Location;
use App\ShowTime;
use App\Theatre;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    //making a booking

    public function bookTickets(BookTicketsRequest $request){
        $input = $request->all();
        $hash = $string = bin2hex(random_bytes(10));
        $save = Booking::create([
            "user_id"=>Auth::user()->id,
            "film_id"=>$input["film"],
            "location_id"=>$input["cinema"],
            "showtime_id"=>$input["show_time"],
            "reference_number" => $hash,
        ]);
        for($x=0;$x<$input["tickets"];$x++){
            $ticket = Ticket::create([
                "film_id"=>$input["film"],
                "booking_id"=>$save->id,
                "showtime_id"=>$input["show_time"],
            ]);
        }
        return back();
    }

}
