<?php

Route::get('/', 'DivisionController@index')
    ->name('index');
Route::get('/data', 'DivisionController@indexData')
    ->name('data');
Route::get('/create', 'DivisionController@create')
    ->name('create');
Route::post('/store', 'DivisionController@store')
    ->name('store');
Route::get('/edit/{id}', 'DivisionController@edit')
    ->name('edit');
Route::patch('/{id}', 'DivisionController@update')
    ->name('update');
Route::get('delete/{id}', 'DivisionController@delete')
    ->name('delete');
Route::delete('/{id}', 'DivisionController@destroy')
    ->name('destroy');
