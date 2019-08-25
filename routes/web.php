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

//Employee routes----

Route::get('/emp', function (){
   return view('restaurant.emp_dash');
});

Route::get('/emp-form', function (){
    return view('restaurant.sal-create');
});

//**************
Route::get('/emp', 'EmployeeController@index');

Route::resource('employee', 'EmployeeController');

Route::post('/employee/submit','EmployeeController@submit');

//-------------------




Route::post('/Event/submit','EventController@submit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin','adminController@index');

});

