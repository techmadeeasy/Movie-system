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
                        <form id="form" method="post" enctype="multipart/form-data" action="{{ route("book") }}">
                            <div class="form-group">
                                <label for="the"> Cinema</label>
                                <select class="form-control" name="cinema">
                                    @foreach($cinemas as $cinema)
                                        <option value="{{ $cinema->id }}">{{ $cinema->suburb }}</option>
                                    @endforeach
                                </select>
                                @error("cinema")
                                <div>
                                    <span class="alert alert-danger"> This field is required</span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Film</label>
                                <input type="text" class="form-control" value="{{ $film->title }}"  disabled>
                                <input type="hidden" value="{{ $film->id }}" name="film">
                                @error("film")
                                <div>
                                    <span class="alert alert-danger"> This field is required</span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Showing times</label>
                                <select class="form-control" name="show_time">
                                    @foreach($showing_times as $times)
                                    <option value="{{  $times->id }}">{{ $time->parse($times->showtime)->format("H:i A")    }}</option>
                                     @endforeach
                                </select>
                                @error("show_time")
                                <div>
                                    <span class="alert alert-danger"> This field is required</span>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Tickets</label>
                                <select class="form-control" name="tickets">
                                    <template v-for="index in 30">
                                        <option :value="index">@{{  index }}</option>
                                    </template>
                                </select>
                            </div>
                            @error("show_time")
                            <div>
                                <span class="alert alert-danger"> This field is required</span>
                            </div>
                            @enderror
                            @csrf
                            <button type="submit" class="btn btn-primary">Submit</button>
                          @if(session()->exists("error"))
                            <div>
                                <span class="alert alert-danger"> Theatre is full for that time</span>
                            </div>
                              @endif
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

