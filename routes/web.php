<?php

use Illuminate\Support\Facades\Route; 
// Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'namespace' => 'admin'], function () {

    Route::group([ 'prefix' => 'admin', 'namespace' => 'admin'], function () {
        Route::get('/', 'AdminController@login');
        Route::post('/', 'AdminController@loginCheck');
        Route::get('/dashboard', 'DashboardController@index');


//=============================  product route  ==========================

Route::get('/products', 'ProductController@index');
Route::get('/staff-products', 'ProductController@staffProduct');
Route::post('/product-urlcheck', 'ProductController@urlCheck')->name('product.urlcheck');
Route::post('/product-foldercheck', 'ProductController@foldercheck')->name('product.foldercheck');
Route::get('/product/create', 'ProductController@create');
Route::post('/product/store', 'ProductController@store');
Route::post('/product/update/{id}', 'ProductController@update');
Route::get('/productEdit/{id}', 'ProductController@edit');
Route::get('/product/delete/{id}', 'ProductController@destroy');
Route::get('products/pagination', 'ProductController@pagination');
Route::get('/top-deal-products', 'ProductController@TopDealProducts');
Route::get('/unpublishedProduct', 'ProductController@unpublishedProduct');


    });

Route::namespace('fontend')->group(function () { 

Route::get('/', 'HomeController@index');
   
});