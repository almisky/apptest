<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', 'AuthController@index')->name('index');

// Route::get('/', function () {
//     return view('auth_login');
// });

Route::prefix('auth')->middleware(['Guest'])->group(function () {
    // Route::prefix('auth')->group(function () {
    Route::get('login-form', 'AuthController@index')->name('loginform');
    Route::post('login', 'AuthController@doLogin')->name('actionlogin');
    Route::get('register-form', 'AuthController@indexRegister')->name('registerform');
    Route::post('register', 'AuthController@doRegister')->name('actionregister');
});
Route::get('logout', 'AuthController@doLogout')->name('actionlogout');


Route::middleware(['hakAkses'])->group(function () {
    Route::get('/', 'UserController@profile')->name('profile');
    Route::get('profile', 'UserController@profile')->name('profile');
    Route::get('profile-settings', 'UserController@profileSettings')->name('profilesettings');
    Route::post('saveprofilesettings', 'UserController@saveProfileSettings')->name('actionsaveprofile');
});

Route::prefix('products')->middleware(['hakAkses'])->group(function () {
    Route::get('index', 'ProductsController@index')->name('productslist');
    Route::get('add-products-page', 'ProductsController@addProductsPage')->name('addproductspage');
    Route::post('add-products', 'ProductsController@addProducts')->name('actionaddproducts');
    Route::get('edit-products-page/{id}', 'ProductsController@editProductsPage')->name('editproductspage');
    Route::post('edit-products', 'ProductsController@editProducts')->name('actioneditproducts');
    Route::get('delete-products/{id}', 'ProductsController@deleteProducts')->name('deleteproducts');
});

Route::prefix('orders')->middleware(['hakAkses'])->group(function () {
    Route::get('order-list', 'OrdersController@orderList')->name('orderslist');
    Route::get('my-order-list', 'OrdersController@myOrderList')->name('myorderslist');
    Route::get('make-order-page', 'OrdersController@makeOrderPage')->name('makeorderpage');
    Route::get('make-order/{id}', 'OrdersController@makeOrder')->name('actionbuyproduct');
    Route::get('cancel-order/{id}', 'OrdersController@cancelOrder')->name('cancelorder');
    Route::get('delete-order/{id}', 'OrdersController@deleteOrder')->name('deleteorder');
    Route::get('export-excel-order-user', 'OrdersController@exportOrdersUser')->name('exportexcelordersuser');
});
