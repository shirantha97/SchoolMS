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
    return view('home');
});

Auth::routes();

Route::post("/adminDashboard" , 'CustomLoginController@login');

Route::group(['middleware' => 'auth'] , function () {

    Route::get("/adminDashboard", function () {
        return view('adminDashboard');
    });
});

Route::get('/home', 'HomeController@index');
Route::get('/createAdmin' , 'CustomLoginController@createAdmin');
Route::post('/storeAdmin' , 'CustomLoginController@storeAdmin');
Route::get('/allAdmins' , 'CustomLoginController@admins');
Route::delete('/Admindestroy/{admin} ' , 'CustomLoginController@Admindestroy');


//Event Routes
Route::get('Event/search','EventController@search');
Route::get('Event/createDemo','EventController@createDemo');
Route::get('Event/monthlyEvent', 'EventController@monthlyEvent');
Route::get('Event/myevents','EventController@myevents');
Route::get('/Event/showEvent/{event}', 'EventController@showEvent');
Route::post('/Event/showEvent/{event}', 'EventController@updateImage');
Route::get('/Event/calendar', 'EventController@calendar');
Route::resource('Event' , 'EventController');

Route::post('Event/{event}/comment','CommentsController@store');
Route::get('Sport/search','SportController@search');
Route::get('Sport/createDemo','SportController@createDemo');
Route::get('Sport/enrolledStudents' , 'SportController@enrolledStudents');
Route::get('Sport/mysports','SportController@mysports');
Route::post('Sport/addStudent' , 'SportController@addStudent');
Route::delete('Sport/removeStudent' , 'SportController@removeStudent');
Route::resource('Sport' ,'SportController');

Route::get('Society/search','SocietyController@search');
Route::get('Society/createDemo','SocietyController@createDemo');
Route::get('Society/enrolledStudents' , 'SocietyController@enrolledStudents');
Route::get('Society/mysocieties','SocietyController@mysocieties');
Route::post('Society/addStudent' , 'SocietyController@addStudent');
Route::delete('Society/removeStudent' , 'SocietyController@removeStudent');
Route::resource('Society' , 'SocietyController');

Route::get('eventAdmin' , 'EventAdminController@eventAdmin');
Route::get('societyAdmin' , 'EventAdminController@societyAdmin');
Route::get('sportAdmin' , 'EventAdminController@sportAdmin');
//End of Event Routes


//inventory
Route::resource('/orders','Ordercontroller');
Route::resource('/supplier','Suppliercontroller');
Route::resource('/stationary','Stationarycontroller');
Route::resource('/labs','labscontroller');
Route::resource('/inventorysports','Sportstocks');
Route::resource('/resource','Resourcecontroller');
Route::resource('/inventoryexpenses','Inventoryexpenses');
Route::get('/inventory','homeview@index');
Route::get('/live_search', 'LiveSearch@index');
Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');




//staff
Route::resource('academics','AcademicController');
Route::resource('nonacademics','NonAcademicController');
Route::resource('leaverequests','LeaveRequestController');
Route::resource('leaverequestsnon','LeaveRequestNonController');


//student
Route::post('/update', 'studentController@store');
Route::get('/std', 'studentController@show');
Route::get('/delete', 'studentController@destroy');
Route::get('/fee', 'studentController@store');
Route::get('/home', 'HomeController@index')->name('home');

//canteen

Route::get('/bookshop_main', function () {
    return view('Pages.bookshop_main');
});
Route::get('/canteen_main', function () {
    return view('Pages.canteen_main');
});

Route::get('/canteen_insert', function () {
    return view('Pages.canteen_insert');
});
Route::get('/bookshop_insert', function () {
    return view('Pages.bookshop_insert');
});
Route::get('/bookshop_home', function () {
    return view('Pages.bookshop_home');
});
Route::get('/canteen_home', function () {
    return view('Pages.canteen_home');
});
Route::get('/Main_page', function () {
    return view('Pages.Main_page');
});
Route::get('/bookshop_sales', function () {
    return view('Pages.bookshop_sales');
});
Route::get('/canteen_sales', function () {
    return view('Pages.canteen_sales');
});

Route::get('/create', function () {
    return view('CanteenItem.create');
});
Route::get('/create', function () {
    return view('BookshopSales.create');
});
Route::get('/view', function () {
    return view('CanteenItem.view');
});
Route::get('/edit', function () {
    return view('CanteenItem.edit');
});
Route::get('/canteen_supplier', function () {
    return view('Pages.canteen_supplier');
});


Route::get('/index', function () {
    return view('finance.index');
});
Route::get('/app', function () {
    return view('layouts.app');
});
Route::get('/next', function () {
    return view('Pages.next');
});

route::resource('CanteenItem','CanteenProductController');
route::resource('BookshopItem','BookshopProductController');
route::resource('BookshopSales','BookshopSalesController');
route::resource('CanteenSales','CanteenSalesController');
route::resource('CanteenSupplier','CanteenSupplierController');


//route::resource('invoice','InvoiceController');
Route::get('invoice/',array('as'=>'info','uses'=>'InvoiceController@index'));

Route::get('invoice/findPrice',array('as'=>'findPrice','uses'=>'InvoiceController@findPrice'));
Route::post('invoice/insert',array('as'=>'insert','uses'=>'InvoiceController@insert'));

//route::resource('Binvoice','BInvoiceController');
Route::get('Binvoice/',array('as'=>'info','uses'=>'InvoiceController@indexB'));
Route::get('Binvoice/findPrice',array('as'=>'findPrice','uses'=>'InvoiceController@findPriceB'));
Route::post('Binvoice/insert',array('as'=>'insert','uses'=>'InvoiceController@insertB'));
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/live_search', 'LiveSearchB@index');
Route::get('/live_search/action', 'LiveSearchB@action')->name('live_search.action');

Route::get('/live_searchB', 'LiveSearchB@indexB');
Route::get('/live_searchB/actionB', 'LiveSearchB@actionB')->name('live_searchB.actionB');

Route::get('/dynamic_pdf', 'DynamicPDFController@index');

Route::get('/dynamic_pdf/pdf', 'DynamicPDFController@pdf');


