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



Route::get('/','ProductController@index')->name('welcome');

Route::get('/type/{code}','ProductController@showByType')->name('show_by_type');

Route::resource('/product','ProductController');

Auth::routes(['register'=>false]);

Route::get('/admin_panel', 'HomeController@index')->name('admin_panel');

Route::post('/admin/products/media', 'AdminProductController@storeMedia')->name('products.storeMedia');

Route::resource('/admin_prods','AdminProductController')->middleware('auth');

Route::post('/cart/add/{product}','ShoppingCartController@addToCart')->name('add_to_cart');

Route::delete('/cart/remove/{id}','ShoppingCartController@removeFromCart')->name('remove_from_cart');

Route::get('/payment','ShoppingCartController@showPaymentPage')->name('payment_page');

Route::post('/payment_validation','ShoppingCartController@paymentConfirmation')->name('payment_confirmation');
