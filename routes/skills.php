<?php

Route::get('/', 'SkillController@index')
    ->name('index');
Route::get('/data', 'SkillController@indexData')
    ->name('data');
Route::get('/create', 'SkillController@create')
    ->name('create');
Route::post('/store', 'SkillController@store')
    ->name('store');
Route::get('/edit/{id}', 'SkillController@edit')
    ->name('edit');
Route::patch('/{id}', 'SkillController@update')
    ->name('update');
Route::get('delete/{id}', 'SkillController@delete')
    ->name('delete');
Route::delete('/{id}', 'SkillController@destroy')
    ->name('destroy');
