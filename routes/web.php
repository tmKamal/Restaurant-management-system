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

Route::get('/Rating', function () {
    return view('restaurant.Rating');
});
//Event routes----

Route::post('/Event/submit','EventController@submit');
Route::get('/Event','EventController@index');

Route::get('/DeleteEvent/{id}/Delete','EventController@DeleteEvent');

Route::get('/EditEvent/{id}/Edit','EventController@EditEventview');

Route::post('/eventsUpdate','EventController@EditEvent');

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






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/emp/{type}/update','adminController@updateEmp');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin','adminController@index');
    Route::get('/employeeManagement','adminController@showEmployeeMgt');
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
