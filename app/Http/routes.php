<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

//Route::get('/', function () {
//    return view('welcome');
//});

Route::resource('/', 'HomeController@show'
);
Route::get('/new', 'UsersCntroller@showLogin');

// route to process the form
//Route::get('/', 'UsersCntroller@showIndex');
//Route::get('/', 'HomeController');


Route::post('/new', 'UsersCntroller@doLogin');
Route::get('/template.signup', 'UsersCntroller@create');
Route::post('/create', 'UsersCntroller@store');
Route::get('/logout', 'UsersCntroller@logout');
//Route::get('/reset','UsersCntroller@reset');
//Route::post('/reset','UsersCntroller@save');
Route::get('/redirect', 'UsersCntroller@redirect');
Route::get('/callback', 'UsersCntroller@callback');