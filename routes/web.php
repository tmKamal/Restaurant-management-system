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

Route::get('/', function () {
    return view('restaurant.index');
});
Route::get('/Event', function () {
    return view('restaurant.Event');
});
Route::post('/Event/submit','EventController@submit');

Route::get('admin','adminController@index');
