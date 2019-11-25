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

Route::get('/', 'FrontEndController@index')->name('shop.cart.index');
Route::get('/cart/add/{id?}', 'CartController@addCart')->name('cart.add');
Route::get('/cart/read', 'CartController@readCart')->name('cart.read');
Route::post('/cart/update', 'CartController@updateCart')->name('cart.update');
Route::get('/cart/remove/{rowId?}', 'CartController@removeCart')->name('cart.remove');

Route::get('/thank', function () {

    return view('thank.index');
})->name('thank');

Route::prefix('admin')->group(function () {

    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController');
    Route::resource('status', 'StatusController');
    Route::resource('colors', 'ColorController');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/order/{id?}', 'OrderController@order')->name('admin.order');
    Route::post('/order/read', 'OrderController@readOrder')->name('admin.order.read');

});

Route::resource('checkout', 'CheckoutController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//------------------------------------------------------------------------------------

Route::prefix('customer')->namespace('Customer')->group(function () {

    Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('customer.password.request');
    Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('customer.password.reset');
    Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('customer.password.email');
    Route::post('/password/reset', 'ResetPasswordController@reset')->name('customer.password.update');

    Route::get('/home', 'CustomerController@index')->name('customer.home');
    Route::get('/login', 'CustomerLoginController@showLoginForm')->name('customer.login');
    Route::get('/order', 'CustomerController@order')->name('customer.order');
    Route::post('/login', 'CustomerLoginController@login');
    Route::post('/logout', 'CustomerLoginController@logout')->name('customer.logout');
    Route::get('/like/{productId}', 'CustomerController@like')->name('customer.like');
});

//*------------------------------------------------------------------------------------------------

Route::resource('categories', 'CategoryController');
Route::resource('products', 'ProductController');

// ----------------------Route Manager-----------------------

// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>Color>>>>>>>>>>>>>>>>>>>>>>
Route::get('/color', 'ManagerController@indexColor')->name('color.index');
Route::get('/color/create', 'ManagerController@createColor')->name('color.create');
Route::get('/color/edit/{id}', 'ManagerController@editColor')->name('color.edit');
Route::post('/color/update', 'ManagerController@updateColor')->name('color.update');
Route::post('/color/store', 'ManagerController@storeColor')->name('color.store');
Route::get('/color/destroy/{id}', 'ManagerController@destroyColor')->name('color.destroy');
Route::get('/color/restore', 'ManagerController@restoreColor')->name('color.restore');

Route::get('/color/restore/info/{id?}', 'ManagerController@postRestoreColor')->name('color.restore.info');

// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>Status>>>>>>>>>>>>>>>>>>>>>>
Route::get('/status', 'ManagerController@indexStatus')->name('status.index');
Route::get('/status/create', 'ManagerController@createStatus')->name('status.create');
Route::get('/status/edit/{id?}', 'ManagerController@editStatus')->name('status.edit');
Route::post('/status/update', 'ManagerController@updateStatus')->name('status.update');
Route::post('/status/store', 'ManagerController@storeStatus')->name('status.store');
Route::get('/status/destroy/{id}', 'ManagerController@destroyStatus')->name('status.destroy');
Route::get('/status/restore', 'ManagerController@restoreStatus')->name('status.restore');
