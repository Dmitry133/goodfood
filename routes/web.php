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

Route::get('/', 'MainController@index')->name('home');
Route::get('/category/{cat}','ProductController@getCategory')->name('showCategory');
Route::get('/category/{cat}/{product_id}','ProductController@getProduct')->name('showProduct');
Route::get('/cart','CartController@index')->name('cartIndex');
Route::post('/add-to-cart','CartController@addToCart')->name('addToCart');
Route::get('/category/','CategoryController@getCatAll')->name('showCatAll');
Route::get('/content/', 'ContentController@index')->name('content');


Auth::routes();

