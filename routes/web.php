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

Route::get('/', 'ProductsController@index')->name('index');

Route::get('cart', 'ProductsController@cart')->name('cart');

Route::get('add-to-cart/{id}', 'ProductsController@addToCart');

Route::patch('update-cart', 'ProductsController@update');

Route::delete('remove-from-cart', 'ProductsController@remove');

Route::get('/checkout/', 'CheckoutController@index')->name('checkout.index');

Route::post('/checkout/order', 'CheckoutController@placeOrder')->name('checkout.place.order');
