<?php

Route::get('/', 'UnitController@index')
    ->name('index');
Route::get('/data', 'UnitController@indexData')
    ->name('data');
Route::get('/create', 'UnitController@create')
    ->name('create');
Route::post('/store', 'UnitController@store')
    ->name('store');
Route::get('/edit/{id}', 'UnitController@edit')
    ->name('edit');
Route::patch('/{id}', 'UnitController@update')
    ->name('update');
Route::get('delete/{id}', 'UnitController@delete')
    ->name('delete');
Route::delete('/{id}', 'UnitController@destroy')
    ->name('destroy');
