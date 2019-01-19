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


Route::group(['middleware' => 'auth'], function (){


Route::get('/', function () {
    return view('home');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categories', 'CategoryController');
Route::resource('products', 'ProductController');
Route::resource('sales', 'SaleController');
Route::resource('discounts', 'DiscountController');

Route::get('sales/discounts/{id}', 'DiscountController@index');

});
