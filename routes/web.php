<?php

use Illuminate\Support\Facades\Route;


Route::view('/','welcome');


Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::get('/login','AuthController@showLogin');
    Route::post('/login','AuthController@login');
    Route::get('/','AuthController@dashboard');

    Route::resource('supplier','SupplierController');
    Route::resource('category','CategoryController');
    Route::resource('brand','BrandController');
    Route::resource('color','ColorController');
    Route::resource('product','ProductController');
});

Route::view('/test','welcome');


