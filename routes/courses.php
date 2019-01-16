<?php

Route::get('/', 'CourseController@index')
    ->name('index');
Route::get('/data', 'CourseController@indexData')
    ->name('data');
Route::get('/create', 'CourseController@create')
    ->name('create');
Route::post('/store', 'CourseController@store')
    ->name('store');

Route::get('/edit/{id}', 'CourseController@edit')
    ->name('edit');
Route::patch('/{id}', 'CourseController@update')
    ->name('update');
Route::get('delete/{id}', 'CourseController@delete')
    ->name('delete');
Route::delete('/{id}', 'CourseController@destroy')
    ->name('destroy');
