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



Route::get('/', 'ProductController@index')->name('home');
Auth::routes();
//Route::resource('customer', 'CustomerController');
Route::prefix('customer')->group(function() {
    Route::get('/register', 'Auth\customerLoginController@showRegisterForm')->name('customer.register');
    Route::get('/login', 'Auth\customerLoginController@showLoginForm')->name('customer.login');
    Route::post('/login', 'Auth\customerLoginController@login')->name('customer.login.submit');
    Route::post('/logout', 'Auth\customerLoginController@logout')->name('customer.logout');
});
Route::redirect('/customer/home', '/', 301);
Route::redirect('/customer/home',  '/', 301);
Route::get('admin/dashboard', 'AdminController@showDashboard');
