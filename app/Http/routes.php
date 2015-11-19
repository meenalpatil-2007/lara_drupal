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
//echo "dfdfdf";exit;
Route::get('/' , function () {
    return view('app');
});



// Route::get('my-profile', 'ProfileController@showProfile');
// Route::get('edit-profile' ,'ProfileController@showProfile');

Route::controller('profile', 'ProfileController');
Route::controller('home', 'HomeController');
Route::controller('', 'UserController');
