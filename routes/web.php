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

Route::get('/', 'CustomerController@getList')->name('customer.list');
Route::get('/Customer/add', 'CustomerController@addCustomer')->name('customer.add');
Route::post('/Customer/add', 'CustomerController@addCustomer')->name('customer.add');
Route::get('/Customer/delete/{id}', 'CustomerController@deleteRecord')->name('customer.delete');
Route::get('/Customer/view/{id}', 'CustomerController@getDetail')->name('customer.view');
