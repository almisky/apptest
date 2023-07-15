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

// Route::prefix('auth')->name('auth.')->middleware(['hakAkses'])->group(function () {
Route::prefix('auth')->group(function () {
    Route::get('login-form', 'AuthController@index')->name('loginform');
    Route::post('login', 'AuthController@doLogin')->name('actionlogin');
    Route::get('logout', 'AuthController@doLogout')->name('actionlogout');
    Route::get('register-form', 'AuthController@indexRegister')->name('registerform');
    Route::post('register', 'AuthController@doRegister')->name('actionregister');
});


// Route::prefix('user')->group(function () {
Route::get('profile', 'UserController@profile')->name('profile');
Route::get('profile-settings', 'UserController@profileSettings')->name('profilesettings');
Route::post('saveprofilesettings', 'UserController@saveProfileSettings')->name('actionsaveprofile');
// });
// Route::prefix('dashboard')->group(function () {
//     Route::post('/', 'OrdersController@do')->name('dashboarduser');
// });
