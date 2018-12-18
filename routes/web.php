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
    
    /*
    Middleware -> auth
    */
    Route::get('/home', function() { return redirect('/town'); });
    Route::resource('town', 'TownController');
    Route::get('/map', 'MapController@index');

});