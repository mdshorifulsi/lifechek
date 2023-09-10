<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::get('/loginForm', 'AdminAuthController@loginForm')->name('login_form');
    Route::post('/login', 'AdminAuthController@admin_login');
    Route::get('/logout', 'AdminAuthController@logout')->name('logout');

});

Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::get('dashboard', 'AdminAuthController@admin_dashboard')->name('dashboard');

});