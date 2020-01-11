@extends("layouts.template")

@section("content")


<!-- Page Content -->
<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Booking Confirmation</h1>
            <p class="lead">Reference : {{ $booking->reference_number }}</p>
            <ul class="list-unstyled">
                <li>Ticket(s) :{{ $booking->tickets->count() }}</li>
                <li>Showing at : {{ $booking->showTime->showtime }}</li>
            </ul>
            <div class="mb-lg-5">
                @if($time->parse($booking->showTime->showtime)->diffInMinutes($time->now()->addHours(2)) > 60)
                <a href="#" class="btn btn-primary">Cancel Booking</a>
                    @endif
            </div>

        </div>
    </div>
</div>


</html>
@endsection
