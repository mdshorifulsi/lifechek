<?php

use Illuminate\Support\Facades\Route;


Route::group(['as' => 'category.', 'prefix' => 'category', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::get('/', 'CategoryController@index')->name('index');
    Route::post('/store', 'CategoryController@store')->name('store');
    Route::post('/update/{id}', 'CategoryController@update')->name('update');
    Route::get('/delete{id}', 'CategoryController@destroy')->name('delete');
    
    Route::get('/inactive/{id}', 'CategoryController@inactive')->name('inactive');
    Route::get('/active/{id}', 'CategoryController@active')->name('active');

});


Route::group(['as' => 'brand.', 'prefix' => 'brand', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::get('/', 'BrandController@index')->name('index');
    Route::post('/store', 'BrandController@store')->name('store');
    Route::post('/update/{id}', 'BrandController@update')->name('update');
    Route::get('/delete{id}', 'BrandController@destroy')->name('delete');
    Route::get('/inactive/{id}', 'BrandController@inactive')->name('inactive');
    Route::get('/active/{id}', 'BrandController@active')->name('active');

});

Route::group(['as' => 'medicinetype.', 'prefix' => 'medicinetype', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::get('/', 'MedicineTypeController@index')->name('index');
    Route::post('/store', 'MedicineTypeController@store')->name('store');
    Route::post('/update/{id}', 'MedicineTypeController@update')->name('update');
    Route::get('/delete{id}', 'MedicineTypeController@destroy')->name('delete');
    Route::get('/inactive/{id}', 'MedicineTypeController@inactive')->name('inactive');
    Route::get('/active/{id}', 'MedicineTypeController@active')->name('active');

});


Route::group(['as' => 'product.', 'prefix' => 'product', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::get('/', 'ProductControler@index')->name('index');
    Route::post('/store', 'ProductControler@store')->name('store');
    Route::post('/update/{id}', 'ProductControler@update')->name('update');
    Route::get('/delete{id}', 'ProductControler@destroy')->name('delete');
    Route::get('/inactive/{id}', 'ProductControler@inactive')->name('inactive');
    Route::get('/active/{id}', 'ProductControler@active')->name('active');

});

Route::group(['as' => 'stock.', 'prefix' => 'stock', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::get('/', 'StockController@index')->name('index');
    
    Route::post('/update/{id}', 'StockController@update')->name('update');
   

});


Route::group(['as' => 'slider.', 'prefix' => 'slider', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::get('/', 'SliderController@index')->name('index');
    Route::post('/store', 'SliderController@store')->name('store');
    Route::post('/update/{id}', 'SliderController@update')->name('update');
    Route::get('/delete{id}', 'SliderController@destroy')->name('delete');
    Route::get('/inactive/{id}', 'SliderController@inactive')->name('inactive');
    Route::get('/active/{id}', 'SliderController@active')->name('active');

});