@extends("layouts.template")

@section("content")
<!-- Page Content -->
<div class="container" style="margin-top: 100px">

    <!-- Heading Row -->
    <div class="row align-items-center my-5">
        <div class="col-lg-7">
            <img class="img-fluid rounded mb-4 mb-lg-0" src="http://placehold.it/900x400" alt="">
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-5">
            <h1 class="font-weight-light">{{ auth()->user()->name }}</h1>
            <p>This is a template that is great for small businesses. It doesn't have too much fancy flare to it, but it makes a great use of the standard Bootstrap core components. Feel free to use this template for any project you want!</p>
        </div>
        <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->

    <!-- Call to Action Well -->
    <div class="card text-white bg-secondary my-5 py-4 text-center">
        <div class="card-body">
            <p class="text-white m-0">Booking made</p>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        @foreach($user->bookings as $booking)
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <div class="card-body">
                    <h2 class="card-title">{{ $booking->film->title }}</h2>
                    <p class="card-text">Movie time : {{$time->parse($booking->showTime->showtime)->format("H:i:s A") }}</p>
                    <p class="card-text">Location : {{ $booking->location->suburb}}</p>
                    <p class="card-text">Theatre : {{ $booking->theatre->name }}</p>
                    <p class="card-text">Ticket(s) : {{ $booking->tickets->count()}}</p>
                    <p class="card-text">Reference Number : {{ $booking->reference_number}}</p>
                </div>
                <div class="card-footer">
                    @if($time->parse($booking->showTime->showtime)->diffInMinutes($time->now()->addHours(2)) > 60)
                    <a href="{{ route("cancel.booking", $booking->id) }}" class="btn btn-primary btn-sm">Cancel</a>
                     @endif
                </div>
            </div>
        </div>
       @endforeach

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

@endsection
