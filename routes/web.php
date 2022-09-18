<?php

use Illuminate\Support\Facades\Route;


Route::get('/','PageController@home');
Route::get('/products','PageController@allProduct');
Route::get('/product/{slug}','PageController@productDetail');
// for auth user guard
Route::get('/register','AuthController@showRegister');
Route::post('/register','AuthController@register');
Route::get('/login','AuthController@showLogin');
Route::post('/login','AuthController@login');

Route::get('/logout','AuthController@logout');

//for api
Route::group(['prefix'=>'api','namespace'=>'Api'],function(){
    Route::get('/home','HomeApi@home');
    Route::get('/product-detail/{slug}','ProductApi@detail');
    Route::get('/add-to-cart','ProductApi@addToCart');
});




Route::get('/admin/login','Admin\AuthController@showLogin');
Route::post('/admin/login','Admin\AuthController@login');
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'isAdmin'],function(){

    Route::get('/','AuthController@dashboard');

    Route::resource('supplier','SupplierController');
    Route::resource('category','CategoryController');
    Route::resource('brand','BrandController');
    Route::resource('color','ColorController');
    Route::resource('product','ProductController');
    Route::resource('product-add', 'ProductAddController');
    Route::resource('income','IncomeController');
    Route::resource('outcome', 'OutcomeController');
    Route::resource('product-remove','ProductRemoveController');
    Route::get('set-feature/{id}','ProductController@setFeature');
    Route::get('remove-feature/{id}','ProductController@removeFeature');

});

Route::view('/test','welcome');



