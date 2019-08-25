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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin','adminController@index');
});

Route::get('/inventory', function () {
    return view('inventory');
});

Route::get('/addItem', function () {
    return view('/restaurant.addItem');
});
Route::get('/show', function () {
    return view('/restaurant.show');
});
Route::get('/edit', function () {
    return view('/restaurant.edit');
});

Route::post('/addItem/submit', 'InventoryController@store');
//Route for INVENTORY
Route::get('/inventory','InventoryController@index');
Route::get('/show/{id}', 'InventoryController@show');
Route::resource('inventory', 'InventoryController');
