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
        Route::get('/lorem', 'lorem\LoremController@getIndex');
        Route::post('/lorem', 'lorem\LoremController@postIndex');
        Route::get('/rug', 'rug\RUGController@getIndex');
        Route::post('/rug', 'rug\RUGController@postIndex');
        Route::get('/xkcd', 'xkcd\XKCDController@getIndex');
        Route::post('/xkcd', 'xkcd\XKCDController@postIndex');
    
});
