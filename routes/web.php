<?php

use App\Order;

Route::get('/', 'HomeController@index');

Auth::routes();
Route::get('home', 'HomeController@index');

Route::resource('product', 'ProductController');

Route::get('product/{name}/stock', 'StockController@create');
Route::post('product/{name}/stock', 'StockController@store');
Route::patch('product/{name}/stock', 'StockController@update');
Route::delete('product/{name}/stock', 'StockController@delete');

Route::get('product/{name}/image', 'ImageController@show');
Route::post('product/{name}/image', 'ImageController@store');
Route::patch('product/{name}/image', 'ImageController@update');
Route::delete('product/{name}/image', 'ImageController@destroy');

Route::get('order', 'OrderController@index'); //
Route::get('order/form', 'OrderController@create'); //
Route::post('order/form', 'OrderController@submit'); //
Route::get('order/{id}', 'OrderController@show'); //
Route::get('order/{id}/edit', 'OrderController@edit'); //
Route::patch('order/{id}/edit', 'OrderController@update'); //

Route::post('order/item', 'ItemController@store');
Route::delete('order/item/{id}', 'ItemController@destroy');

Route::patch('order/{id}', 'PaymentController@store');

Route::get('test', function()
{
	$product = Order::find(1)->products()->where('id', 1)->where('attribute', 'm')->first();

	$product->pivot->quantity = 10;

	$product->pivot->save();

	//dd(Order::find(1)->products()->updateExistingPivot($product->id, ['quantity' => 10]));
});


Auth::routes();


