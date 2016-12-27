<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('home', 'HomeController@index');

Route::resource('shirt', 'ShirtController');
Route::get('shirt/{name}/image', 'ImageController@show');
Route::post('shirt/{name}/image', 'ImageController@store');
Route::patch('shirt/{name}/image', 'ImageController@update');
Route::delete('shirt/{name}/image', 'ImageController@destroy');

Route::get('order', 'OrderController@index');
Route::get('order/create', 'OrderController@create');
Route::patch('order', 'OrderController@addItem');
Route::get('order/form', 'OrderController@create');
Route::post('order/form', 'OrderController@submit');
Route::get('order/{id}', 'OrderController@show');
Route::patch('order/{id}', 'OrderController@uploadPayment');
Route::get('order/{id}/edit', 'OrderController@edit');
Route::patch('order/{id}/edit', 'OrderController@update');

Auth::routes();

Route::get('/home', 'HomeController@index');
