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
// Route::get('user/{name}/support', function ($name) {
//     echo $name;
// });
Route::get('/' , function () {
    return view('app');
});

Route::controller('user', 'UserController');
Route::controller('profile', 'ProfileController');

