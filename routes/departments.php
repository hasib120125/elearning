<?php

Route::get('/', 'DepartmentController@index')
    ->name('index');
Route::get('/data', 'DepartmentController@indexData')
    ->name('data');
Route::get('/create', 'DepartmentController@create')
    ->name('create');
Route::post('/store', 'DepartmentController@store')
    ->name('store');
Route::get('/edit/{id}', 'DepartmentController@edit')
    ->name('edit');
Route::patch('/{id}', 'DepartmentController@update')
    ->name('update');
Route::get('delete/{id}', 'DepartmentController@delete')
    ->name('delete');
Route::delete('/{id}', 'DepartmentController@destroy')
    ->name('destroy');
