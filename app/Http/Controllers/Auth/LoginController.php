<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Route;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(){
      //Check if login attemp was made from the single view of a movie for redirect purpose
      if(strstr(url()->previous(), "view-showing")){
          $movie_id = explode("/", url()->previous());
          session()->flash("movie_id", $movie_id[4]);
      }
      return view("auth.login");
    }

    public function redirectTo(){
        // redirecting to single view if login was attempted from that page
      return  session()->exists("movie_id") ? route("single.view", session()->get("movie_id")) : "/home";
    }

}
