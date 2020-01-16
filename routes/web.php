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

Route::resource('/admin_prods','AdminProductController')->middleware('auth');

Route::post('/admin/products/media', 'AdminProductController@storeMedia')->name('products.storeMedia');

Route::get('/cart/details','ShoppingCartController@getCart')->name('card_details');

Route::post('/cart/add/{product}','ShoppingCartController@addToCart')->name('add_to_cart');

Route::delete('/cart/remove/{id}','ShoppingCartController@removeFromCart')->name('remove_from_cart');

Route::get('/payment','ShoppingCartController@showPaymentPage')->name('payment_page');

Route::post('/payment_validation','ShoppingCartController@paymentConfirmation')->name('payment_confirmation');

Route::get('/admin/purchases/','AdminPurchaseController@index')->name('purchases');

Route::get('/admin/purchases/delivered','AdminPurchaseController@deliveredPurchases')->name('delivered_purchases');

Route::post('admin/purchase/delivery','AdminPurchaseController@validatePurchaseDelivery')->name('admin_validate_purchase_delivery');

Route::get('admin/get-prod/stock/{admin_prod}','AdminProductController@editStock')->name('admin_prods.edit_stock');

Route::put('admin/update-prod/stock/{admin_prod}','AdminProductController@updateStock')->name('admin_prods.update_stock');

Route::post('/shipping/price','ShoppingCartController@setShippingPrice')->name('set_shipping_price');
