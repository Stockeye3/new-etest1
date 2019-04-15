<?php

Auth::routes();





// Route::resource('customer', 'customerController')->only([
//    'show', 'create', 'store', 'update', 'destroy', 'ban', 'unban', 'edit'
// ]);

//CUSTOMER ROUTES 
 Route::prefix('customer')->group(function() {
    // Auth Customer Routes
    Route::get('/register', 'Auth\customerLoginController@showRegisterForm')->name('customer.register');
    Route::get('/login', 'Auth\customerLoginController@showLoginForm')->name('customer.login');
    Route::post('/login', 'Auth\customerLoginController@login')->name('customer.login.submit');
    Route::post('/logout', 'Auth\customerLoginController@logout')->name('customer.logout');
    // Customer Controller Routes
    Route::get('/{customer}','CustomerController@show')->name('customer.show');
    Route::get('/create','CustomerController@create')->name('customer.create');
    Route::post('/store','CustomerController@store')->name('customer.store');
    Route::match(['put', 'patch'],'/{customer}','CustomerController@update')->name('customer.update');
    Route::delete('/{customer}','CustomerController@destroy')->name('customer.destroy');
    Route::get('/{customer}/edit','CustomerController@edit')->name('customer.edit');
    Route::patch('/{customer}/ban','CustomerController@ban')->name('customer.ban');
    Route::patch('/{customer}/unban','CustomerController@unban')->name('customer.unban');
    Route::get('/{customer}/orders','OrderController@show')->name('customer.viewOrders');
});
Route::redirect('/customer/home',  '/', 301);
Route::get('/banned', 'CustomerController@showBanPage')->name('banned');
//END CUSTOMER ROUTES



//Admin Routes
Route::prefix('admin')->group(function() {
Route::get('/dashboard', 'AdminController@showDashboard')->name('admin.dashboard');
Route::get('/profile', 'AdminController@showProfile')->name('admin.profile');
});

Route::resource('product','ProductController');
Route::resource('category','CategoryController');

Route::get('/add-to-cart/{product}', 'CartController@addToCart')->name('product.addtocart');

Route::get('/shopping-cart', 'CartController@showCart')->name('shoppingCart');
Route::patch('/shopping-cart', 'CartController@update')->name('cart.update');
Route::get('/checkout', 'CartController@showcheckout')->name('checkout.view');
Route::post('/checkout', 'CartController@checkout')->name('checkout.submit');
Route::get('/test','ProductController@test')->name('test.show');


//ticket Routes

Route::get('/create-ticket', 'TicketsController@create');
Route::post('/create-ticket', 'TicketsController@store');

