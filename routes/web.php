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

Route::get('/', function () { return redirect('/login'); });
Auth::routes();

Route::group(['middleware' => 'auth'], function() {

    // Game
    Route::get('/client', function() { return view('game2') ;});

    /*
    Middleware -> auth
    */
    Route::get('/home', function() { return redirect('/client'); });
    Route::resource('/town', 'TownController');
    Route::resource('/barrack', 'BarracksController');
    Route::get('/map', 'MapController@index');
    Route::get('/battle/{offensive}/{defensive}', 'BattleController@attack');

});