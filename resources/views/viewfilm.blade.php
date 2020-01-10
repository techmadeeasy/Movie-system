@extends("layouts.template")
@section("content")
    <!-- Page Content -->
    <div class="container" style="margin-top: 100px">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <!-- Title -->
                <h1 class="mt-4">{{ $film->title }}</h1>

                <!-- Author -->

                <hr>

                <!-- Date/Time -->
                <p>showing at : {{ $film->showing_time }}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>

                <!-- Comments Form -->
                @auth
                <div class="card my-4">
                    <h5 class="card-header">Book ticket</h5>
                    <div class="card-body">
                        <form id="form" action="post" action="">
                            <div class="form-group">
                                <label for="the"> Cinema</label>
                                <select class="form-control" name="theatre" onchange="printsomething()">
                                    @foreach($cinemas as $cinema)
                                        <option value="{{ $cinema->id }}">{{ $cinema->suburb }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Film</label>
                                <input type="text" class="form-control" value="{{ $film->title }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Showing times</label>
                                <select class="form-control" name="theatre">
                                    @foreach($showing_times as $times)
                                    <option value="{{  $times->id }}">{{  $times->showtime }}</option>
                                     @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Tickets</label>
                                <select class="form-control" name="theatre">
                                    <template v-for="index in 30">
                                        <option :value="index">@{{  index }}</option>
                                    </template>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                    @else
                    <h5 class="card-header"><a href="{{ route("login") }}" class="btn btn-primary">Login to book ticket</a> </h5>
                 @endauth
            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for..." disabled>
                            <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
                        </div>
                    </div>
                </div>
                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">Action</a>
                                    </li>
                                    <li>
                                        <a href="#">Romance</a>
                                    </li>
                                    <li>
                                        <a href="#">Comedy</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">Love</a>
                                    </li>
                                    <li>
                                        <a href="#">SCFI</a>
                                    </li>
                                    <li>
                                        <a href="#">Adventure</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection

@push("extra-script")
    <script>
        new Vue({
            el:"#form",
            data : {
                result : "",
                theatre_id : "",
                theatres : "",
            },
        })
    </script>
@endpush

