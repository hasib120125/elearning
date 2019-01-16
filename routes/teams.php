<?php

Route::get('/', 'TeamController@index')
    ->name('index');
Route::get('/data', 'TeamController@indexData')
    ->name('data');

Route::get('/attach-users', 'TeamController@showAttachUsersForm')
    ->name('attach-users');
Route::post('/attach-users', 'TeamController@attachUsers');

Route::get('/create', 'TeamController@create')
    ->name('create');
Route::post('/store', 'TeamController@store')
    ->name('store');
Route::get('/edit/{id}', 'TeamController@edit')
    ->name('edit');
Route::patch('/{id}', 'TeamController@update')
    ->name('update');
Route::get('delete/{id}', 'TeamController@delete')
    ->name('delete');
Route::delete('/{id}', 'TeamController@destroy')
    ->name('destroy');
