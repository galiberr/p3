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

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('index');
    });

    Route::get('/lorem', function () {
        return view('lorem.index');
    });

    Route::get('/rug', function () {
        return view('rug.index');
    });

    Route::get('/xkcd', function () {
        return view('xkcd.index');
    });

    Route::get('/practice', function () {
        return view('practice');
    });

    
    

});
