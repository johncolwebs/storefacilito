<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', "MainController@home");
Route::get('/carrito', 'ShoppingCartsController@index')->name('carrito');
Route::post('/carrito', 'ShoppingCartsController@checkout')->name('carrito.pay');
Route::get('/payments/store', 'PaymentsController@store')->name('payments.store');

Auth::routes();

Route::resource('products', 'ProductsController');
Route::resource('in_shopping_carts', 'InShoppingCartsController', [
  'only' => ['store', 'destroy']
  ]);
Route::resource('compras', 'ShoppingCartsController', [
  'only' => ['show']
  ]);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('orders', 'OrdersController', [
      'only' => ['index', 'update']
      ]);
});

//Route::resource('payments', 'PaymentsController');

Route::get('/home', 'HomeController@index');