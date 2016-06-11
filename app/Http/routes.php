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
Route::post('/api/test',function(){
    return "test";
});
Route::get('/', 'HomeController@show');
Route::get('/portofolioUsers/{id}', 'HomeController@portofolio');
Route::get('/new', 'UsersCntroller@showLogin');
Route::get('/ProjectsWantedDetails/{id}','HomeController@showWantedDetails');
Route::get('/ProjectsHightDetails/{id}','HomeController@showHightDetails');
// route to process the form
//Route::get('/', 'UsersCntroller@showIndex');
//Route::get('/', 'HomeController');


Route::post('/profile', 'UsersCntroller@doLogin');
Route::get('/template.signup', 'UsersCntroller@create');
Route::post('/create', 'UsersCntroller@store');
Route::get('/logout', 'UsersCntroller@logout');
//Route::get('/reset','UsersCntroller@reset');
//Route::post('/reset','UsersCntroller@save');
Route::get('/redirect', 'UsersCntroller@redirect');
Route::get('/callback', 'UsersCntroller@callback');
Route::get('/userProfile/{id}', 'UsersCntroller@profile');
Route::get('/portofolioProfile/{id}', 'UsersCntroller@portofolioProfile');


Route::get('/addProject', 'ProjectController@create');
Route::post('/addProject', 'ProjectController@store');

Route::get('/ProjectsHired', 'ProjectController@showProjectsHired');
Route::get('/ProjectsWorked', 'ProjectController@showProjectsWorked');
Route::get('/ProjectsWorkedDetails/{id}','ProjectController@showProjectsWoredDetails');
Route::get('/ProjectsHiredDetails/{id}','ProjectController@showProjectsHiredDetails');
//        , function () {
//    return view('projects.askTableDetails');
//}
//        );
Route::get('/allOffer', function () {
    return view('projects.allOffer');
}
        );
Route::post('/addOffer', 'OfferController@create');
Route::post('/saveOffer', 'OfferController@store');
Route::post('/showOffer', 'OfferController@show');
//Route::get('/userProfile', function () {
//    return view('_template.userProfile');
//}
//        );

//Route::get('/portofolioUsers', function () {
//    return view('_template.portofolioUser');
//}
//        );