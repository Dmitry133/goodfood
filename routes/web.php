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

Route::get('/', 'MainController@index')->name('home');
Route::get('/category/{cat}','ProductController@getCategory')->name('showCategory');
Route::get('/category/{cat}/{product_id}','ProductController@getProduct')->name('showProduct');
Route::get('/cart','CartController@index')->name('cartIndex');
Route::post('/add-to-cart','CartController@addToCart')->name('addToCart');
Route::get('/category/','CategoryController@getCatAll')->name('showCatAll');
Route::get('/content/', 'ContentController@index')->name('content');
Route::resource('/contact/', 'ContactController')->name('*','contact');

Route::resource('/prodcreate/','ProdController')->name('*','createprod');

Route::get('/prodcreate/edit/{id}','ProdController@getProduct');

Route::put('/prodcreate/edit/{id}','ProdController@update')->name('editprod');
Route::post('/prodcreate/edit/{id}','ProdController@destroy')->name('delprod');

Route::get('/content/{cat}','CatController@getCat');

Route::put('/content/{cat}','CatController@update')->name('editcat');
Route::post('/content/{cat}','CatController@destroy')->name('delcat');

Route::resource('/content/','CatController')->name('*','createcat');


//Route::resource('/prodcreate/','ProdController')->name('*','editprod');
//Route::resource('/content/','CatController')->name('*','editcat');





