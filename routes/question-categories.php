<?php

Route::get('/', 'QuestionCategoryController@index')
    ->name('index');
Route::get('/data', 'QuestionCategoryController@indexData')
    ->name('data');
Route::get('/create', 'QuestionCategoryController@create')
    ->name('create');
Route::post('/store', 'QuestionCategoryController@store')
    ->name('store');
Route::get('/edit/{id}', 'QuestionCategoryController@edit')
    ->name('edit');
Route::patch('/{id}', 'QuestionCategoryController@update')
    ->name('update');
Route::get('delete/{id}', 'QuestionCategoryController@delete')
    ->name('delete');
Route::delete('/{id}', 'QuestionCategoryController@destroy')
    ->name('destroy');
