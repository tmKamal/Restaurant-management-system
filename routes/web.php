<?php

use App\Event;
use Illuminate\Support\Facades\Input;
use App\Inventory;
use App\events;

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

//Event routes----

Route::post('/Event/submit','EventController@submit');
Route::get('/Event','EventController@index');

Route::get('/DeleteEvent/{id}/Delete','EventController@DeleteEvent');

Route::get('/EditEvent/{id}/Edit','EventController@EditEventview');

Route::post('/eventsUpdate','EventController@EditEvent');

Route::get('/', 'MenuController@showIndex');


Route::post('/searchE',function (){
   $q = Input::get('q');
   if($q != ""){
       $event = Event::where('name', 'LIKE' , '%' . $q . '%')
           ->orWhere('email', 'LIKE' , '%' . $q . '%')
           ->orWhere('location', 'LIKE' , '%' . $q . '%')
           ->orWhere('type', 'LIKE' , '%' . $q . '%')
           ->orWhere('massage', 'LIKE' , '%' . $q . '%')
           ->orWhere('phone', 'LIKE' , '%' . $q . '%')
           ->orWhere('date', 'LIKE' , '%' . $q . '%')
           ->get();
       if(count($event)>0)
           return view('/restaurant.eventSearch')->withDetails($event)->withQuery($q);
   }
    return view('/restaurant.eventSearch')->withMessage("No Events found!!!!!!!!!!!.......");
});



Route::get('/Rating', function () {
    return view('restaurant.Rating');
});

Route::get('/thank', function () {
    return view('restaurant.thank');
});

Route::get('/uThank', function () {
    return view('restaurant.uThank');
});

Route::get('/eventManagement', function () {
    return view('restaurant.eventManagement');
});




//--------------------------------------------Employee routes---------------------------------------------------------
Route::get('/emp', function (){
   return view('restaurant.emp_dash');
});
Route::get('/emp-form', function (){
    return view('restaurant.sal-create');
});
Route::get('/sal-form', function (){
   return view('restaurant.sal-list');
});

Route::get('/emp-overview/{id}', function (){
    return view('restaurant.emp-overview');
});

Route::get('/emp', 'EmployeeController@index');
Route::get('/employee/{id}', 'EmployeeController@show');
Route::resource('employee', 'EmployeeController');
Route::post('/employee/submit','EmployeeController@submit');

//Route::get('/emp-overview/{id}', 'EmployeeController@showemp');

Route::get('/sal-list', 'SalaryPayController@index');
Route::get('/sal-add', 'SalaryPayController@show');
Route::get('salarypay/{id}', 'SalaryPayController@show');
Route::POST('/salarypay/submit', 'SalaryPayController@store');


//------------------------------------END EMP ROUTES------------------------------------------------------------------


Route::get('/kitchen', 'KitchenController@index');
Route::post('/kitchen/{oid}/assign','kitchenController@assign');


/* -----Routes CR------------- */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/emp/{type}/update','adminController@updateEmp');
//delivery

Route::get('/delivery','adminController@showDelivery');

Route::get('/deliveryPending','adminController@showPendingDelivery');
Route::get('/deliveryCompleted','adminController@showCompletedDelivery');
Route::get('/delivery/{dId}/pick','adminController@pick');
Route::get('/delivery/{dId}/delivered','adminController@delivered');
Route::get('/delivery/{dId}/remove','adminController@remove');
Route::get('/delivery/{did}/showMap','adminController@showMap');



Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin','adminController@index');
    Route::get('/employeeManagement','adminController@showEmployeeMgt');
    Route::get('/deliveryMap','adminController@showDeliveryMap');
});
//Report Generating Routes
Route::get('/exportDeliveryExcel', 'adminController@exportDelivery');
//Live Search 
Route::get('/live_search', 'LiveSearch@index');
Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');

/* -----END - Routes CR------------- */


/* -----Routes for INVENTORY------------- */

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
Route::get('/inventory','InventoryController@index');
Route::get('/show/{id}', 'InventoryController@show');
Route::resource('inventory', 'InventoryController');
Route::get('/lowstock','InventoryController@lowstock');
Route::get('/expired','InventoryController@expired');

//Inventory Search
Route::post( '/search', function () {
    $q = Input::get ( 'q' );
    if($q != ""){
      $item = Inventory::where('Product_Name', 'LIKE' , '%' . $q . '%')
                            ->orWhere('Brand_Name', 'LIKE' , '%' . $q . '%')
                            ->orWhere('Category', 'LIKE' , '%' . $q . '%')
                            ->get();
      if(count($item)>0)
            return view('/restaurant.invSearch')->withDetails($item)->withQuery($q);
    }
    return view('/restaurant.invSearch')->withMessage("No Products found");
} );



/* Routes for Menu */
Route::get('/menu', 'MenuController@index');
Route::post('/menuSubmit', 'MenuController@submit');
Route::get('/menuDetails', 'MenuController@details');
Route::get('/menu/{mId}/delete', 'MenuController@delete');
Route::get('/menu/{mId}/update', 'MenuController@update');
Route::post('/menu/{mId}/menuUpdate','MenuController@menuUpdate'); 


  
Route::get('/cart', 'OrderController@viewCart');

Route::get('/addToCart/{id}', 'OrderController@addToCart');
Route::get('/addToCartPost/{id}', 'OrderController@addToCartPost');
Route::get('/buyNow/{id}', 'OrderController@buyNow');
Route::post('/paysuccess', 'OrderController@codpay');
Route::post('/paysuccesspost', 'PaymentController@submit');
Route::get('/removeCartItem/{id}', 'OrderController@removeCartItem');
Route::get('/payment', 'PaymentController@payView');
Route::get('/onlinepayment', 'PaymentController@payonline');
Route::get('/increase/{id}', 'OrderController@increase');
Route::get('/decrease/{id}', 'OrderController@decrease');

Route::get('/myorders','OrderController@myOrders');
Route::post('/menuItemSearch','HomeController@searchx');
Route::get('/menuItemSearchget/{id}','HomeController@searchxget');
Route::get('//paymentIncomeHistory','PaymentController@adminPayHistory');
Route::get('/returnSuccess','PaymentController@returnUrl');
Route::get('/cancel','PaymentController@cancelUrl');
Route::get('/payhistoryby/{id}','PaymentController@payhistoryby');
Route::post('/notify','PaymentController@notify');

Route::get('/test','PaymentController@test');

