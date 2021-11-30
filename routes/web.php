<?php

use Illuminate\Support\Facades\Route; 
// Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'namespace' => 'admin'], function () {

    Route::group([ 'prefix' => 'admin', 'namespace' => 'admin'], function () {
        Route::get('/', 'AdminController@login');
        Route::post('/', 'AdminController@loginCheck');
        Route::get('/dashboard', 'DashboardController@index');


//=============================  product route  ==========================

Route::get('/products', 'ProductController@index'); 
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
Route::get('/getSubCategoryForProduct/{id}', 'ProductController@getSubCategoryForProduct');


/****=============== category section    =====================  ******/
Route::get('/categories', 'CategoryController@index');
Route::post('category-urlcheck', 'CategoryController@urlCheck');
Route::get('category/create', 'CategoryController@create');
Route::post('category/store', 'CategoryController@store');
Route::post('/category/update/{id}', 'CategoryController@update');
Route::get('/category/{id}', 'CategoryController@edit');
Route::get('/category/delete/{id}', 'CategoryController@delete');
Route::get('category/pagination/fetch_data', 'CategoryController@fetch_data');  




/****=============== admin page section    =====================  ******/
Route::get('/pages', 'PageController@index');
 Route::get('/page/create', 'PageController@create');
Route::post('/page/store', 'PageController@store');
Route::post('/page/update/{id}', 'PageController@update');
Route::get('/page/{id}', 'PageController@edit');
Route::get('/page/delete/{id}', 'PageController@delete');



    });

Route::namespace('fontend')->group(function () { 

Route::get('/', 'HomeController@index');
Route::get('/category', 'HomeController@category');
Route::get('/product', 'HomeController@product');
Route::get('/about', 'HomeController@about');
   
});