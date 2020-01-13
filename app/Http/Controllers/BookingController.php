<?php

namespace App\Http\Controllers;

use App\Booking;

use App\Http\Requests\BookTicketsRequest;
use App\Location;
use App\Theatre;
use App\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    //making a booking

    public function bookTickets(BookTicketsRequest $request){
        $input = $request->all();
        $hash = $string = bin2hex(random_bytes(10));
        $theatres = Location::findorFail($input["cinema"]);
        //checking if the theatre room is not full
        if($theatres->theatres[0]->seatNumbers->where("showtime_id", $input["show_time"])->count() <30){
            $theatre = $theatres->theatres[0]->id;
        }
        elseif($theatres->theatres[1]->seatNumbers->where("showtime_id", $input["show_time"])->count() <30){
            $theatre = $theatres->theatres[1]->id;
        }
        else{
            $flash = session()->flash("error");
            return back();
        };
        $save = Booking::create([
            "user_id"=>Auth::user()->id,
            "film_id"=>$input["film"],
            "location_id"=>$input["cinema"],
            "theatre_id"=>$theatre,
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
        return redirect()->route("confirmation", $save->id);
    }

    //display booking confirmation
    public function bookingConfirmation($id){
        $booking = Booking::findorFail($id);
        $time = new Carbon();
        return view("booking-confirm", compact("booking", "time"));
    }

    public function cancelBooking($id){
      $booking = Booking::findorFail($id)->delete();
       return $booking = Ticket::whereBookingId($id)->delete();
        session()->flash("cancelled", "");
        return view("cancel-booking");
    }
}
