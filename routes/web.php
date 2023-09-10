<?php

Route::get('/', function () {
    return view('layouts');
});

Auth::routes();



Route::get('/{vue_capture?}',function(){

    return view('layouts');
})->where('vue_capture','[\/\w\.-]*');