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



Route::get('/', 'HomeController@index')->name('home');

Route::resource('categories', CategoriesController::class);
Route::resource('products', ProductsController::class);
Route::resource('shops', ShopsController::class);
Route::resource('sales', SalesController::class);
/*Route::resource('products', 'ProductController');
Route::resource('sales', 'SaleController');
Route::resource('discounts', 'DiscountController');
Route::resource('shops', 'ShopController');

Route::get('sales/discounts/{id}', 'DiscountController@index');*/

});
