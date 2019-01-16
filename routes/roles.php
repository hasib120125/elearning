<?php

Route::get('/', 'RoleController@index')
    ->name('index');
Route::get('/data', 'RoleController@indexData')
    ->name('data');
Route::get('/create', 'RoleController@create')
    ->name('create');
Route::post('/store', 'RoleController@store')
    ->name('store');
Route::get('/edit/{id}', 'RoleController@edit')
    ->name('edit');
Route::patch('/{id}', 'RoleController@update')
    ->name('update');
Route::get('delete/{id}', 'RoleController@delete')
    ->name('delete');
Route::delete('/{id}', 'RoleController@destroy')
    ->name('destroy');
