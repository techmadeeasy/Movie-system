<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "FilmController@nowShowing")->name("welcome");
Route::get('/view-showing/{id}', "FilmController@viewNowShowing")->name("single.view");
Route::get("cinema/theatre/{id}", "FilmController@showTheatres");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
