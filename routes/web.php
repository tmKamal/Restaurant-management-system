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

<<<<<<< Updated upstream
Route::get('/', function () {
    return view('restaurant.index');
});

Route::get('admin','adminController@index');
=======

Route::get('/Event', function () {
    return view('restaurant.Event');
});
Route::post('/Event/submit','EventController@submit');

Auth::routes();

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin','adminController@index');

});

Route::get('/cart', 'OrderController@viewCart');
Route::get('/addToCart/{id}', 'OrderController@addToCart');
Route::get('/buyNow/{id}', 'OrderController@buyNow');
Route::get('/paysuccess', 'OrderController@codpay');

Route::get('/removeCartItem/{id}', 'OrderController@removeCartItem');
Route::get('/payment', 'PaymentController@payView');



>>>>>>> Stashed changes
