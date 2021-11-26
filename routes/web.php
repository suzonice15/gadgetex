<?php

use Illuminate\Support\Facades\Route;
 

Route::namespace('fontend')->group(function () { 
  
Route::get('/', 'HomeController@index');
   
});