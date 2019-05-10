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
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function() {

	Route::get('/',function(){
		return redirect()->route('dashboard');
	});

	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

	Route::resource('products','ProductsController');

	Route::get('/order/index','OrdersController@index')->name('order.index');

	Route::get('/order/details/{id}','OrdersController@details')->name('order.details');

});


Route::get('/', 'frontendController@index')->name('home');

Route::get('/product/{id}','frontendController@show')->name('show');

Route::post('/cart/add','ShoppingController@add')->name('cart.add');

Route::get('/cart/view','ShoppingController@cart')->name('cart.view');

Route::get('/cart/remove/{id}','ShoppingController@remove')->name('cart.remove');

Route::get('/cart/incr/{id}/{qty}','ShoppingController@incr')->name('cart.incr');
Route::get('/cart/decr/{id}/{qty}','ShoppingController@decr')->name('cart.decr');

Route::post('/cart/checkout','ShoppingController@checkout')->name('cart.checkout');

Route::post('/cart/pay','ShoppingController@pay')->name('cart.pay');

Route::get('/cart/destroy','ShoppingController@destroy')->name('cart.destroy');






