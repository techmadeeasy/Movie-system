@extends("layouts.template")

@section("content")


    <!-- Page Content -->
    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="mt-5">Booking Cancellation</h1>
                <div class="mb-lg-5">
                    @if(session()->exists("cancelled"))
                        <div>
                            <span class="alert alert-warning"> Your Booking has been cancelled</span>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>

@endsection

