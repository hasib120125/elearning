<?php

Route::get('/', 'GroupController@index')
    ->name('index');
Route::get('/data', 'GroupController@indexData')
    ->name('data');
Route::get('/create', 'GroupController@create')
    ->name('create');
Route::post('/store', 'GroupController@store')
    ->name('store');
Route::get('/edit/{id}', 'GroupController@edit')
    ->name('edit');
Route::patch('/{id}', 'GroupController@update')
    ->name('update');
Route::get('delete/{id}', 'GroupController@delete')
    ->name('delete');
Route::delete('/{id}', 'GroupController@destroy')
    ->name('destroy');
