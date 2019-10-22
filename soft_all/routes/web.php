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

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


           //======Category Route======//
Route::get('/category', 'CategoryController@index');
Route::post('/category/insert', 'CategoryController@category_insert');
Route::get('/delete/category/{cat_id}', 'CategoryController@delete');
Route::get('/edit/category/{cat_id}', 'CategoryController@edit');
Route::get('/click/status/{cat_id}', 'CategoryController@clickstatus');
Route::post('/category/update', 'CategoryController@update');

			//======Product Route======//
route::get('/product','ProductController@index');
route::post('/add/product/insert','ProductController@product_insert');