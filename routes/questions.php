<?php

Route::get('/', 'QuestionController@index')
    ->name('index');
Route::get('/data', 'QuestionController@indexData')
    ->name('data');

Route::get('/create', 'QuestionController@create')
    ->name('create');
Route::post('/store', 'QuestionController@store')
    ->name('store');

Route::get('/create-bulk', 'QuestionController@createBulk')
    ->name('create-bulk');
Route::post('/store-bulk', 'QuestionController@storeBulk')
    ->name('store-bulk');

Route::post('/export-exam-question','QuestionController@examQuestionExport')
    ->name('export-exam-question');

Route::get('/edit-bulk', 'QuestionController@editBulk')
    ->name('edit-bulk');
Route::post('/update-bulk', 'QuestionController@updateBulk')
    ->name('update-bulk');

Route::get('/delete-bulk', 'QuestionController@deleteBulk')
    ->name('delete-bulk');
Route::post('/destroy-bulk', 'QuestionController@destroyBulk')
        ->name('destroy-bulk');

Route::get('/edit/{id}', 'QuestionController@edit')
    ->name('edit');
Route::patch('/{id}', 'QuestionController@update')
    ->name('update');

Route::get('delete/{id}', 'QuestionController@delete')
    ->name('delete');
Route::delete('/{id}', 'QuestionController@destroy')
    ->name('destroy');
