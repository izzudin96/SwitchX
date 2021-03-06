<?php

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('about', 'PagesController@about'); //
Auth::routes();

Route::get('dashboard', 'DashboardController@index');
Route::patch('dashboard', 'DashboardController@update');
Route::get('dashboard/general', 'DashboardController@general');
Route::get('dashboard/payment', 'DashboardController@payment');
Route::get('dashboard/homepage', 'DashboardController@homepage');
Route::get('dashboard/product', 'DashboardController@product');
Route::get('dashboard/order', 'DashboardController@order');
Route::get('dashboard/user', 'DashboardController@user');
Route::get('dashboard/analytics', 'DashboardController@analytics');

Route::post('dashboard/{id}/image', 'ImageController@storeDashboardImage');
Route::delete('dashboard/{id}/image', 'ImageController@destroy');

Route::get('shipping', 'ShippingController@index');
Route::post('shipping', 'ShippingController@store');
Route::delete('shipping', 'ShippingController@destroy');

Route::resource('product', 'ProductController');

Route::get('product/{name}/stock', 'StockController@create');
Route::post('product/{name}/stock', 'StockController@store');
Route::patch('product/{name}/stock', 'StockController@update');
Route::delete('product/{name}/stock', 'StockController@destroy');

Route::get('product/{name}/image', 'ImageController@show');
Route::post('product/{name}/image', 'ImageController@store');
Route::patch('product/{name}/image', 'ImageController@update');
Route::delete('product/{name}/image', 'ImageController@destroy');

Route::get('order', 'OrderController@index');
Route::get('order/form', 'OrderController@create');
Route::post('order/form', 'OrderController@submit');
Route::get('order/{id}', 'OrderController@show');
Route::get('order/{id}/edit', 'OrderController@edit');
Route::patch('order/{id}/edit', 'OrderController@update');
Route::delete('order/{id}/edit', 'OrderController@destroy');

Route::post('order/item', 'ItemController@store');
Route::delete('order/item/{id}', 'ItemController@destroy');

Route::patch('order/{id}', 'PaymentController@store');
