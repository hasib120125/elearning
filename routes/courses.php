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

Route::get('liveclass', 'LiveclassController@index')
    ->name('liveclass');
Route::get('/liveclass-data', 'LiveclassController@indexData')
    ->name('liveclass-data');
Route::get('liveclass-create', 'LiveclassController@create')
    ->name('liveclass-create');     
Route::post('liveclass-save', 'LiveclassController@store')
    ->name('liveclass-save');      
Route::get('liveclass-assign-form', 'LiveclassController@showAssignmentForm')
    ->name('liveclass-assign-form');    
Route::post('liveclass-assign', 'LiveclassController@assign')
    ->name('liveclass-assign');
Route::get('liveclass-assign-status', 'LiveclassController@status')
    ->name('liveclass-assign-status');

Route::get('liveclass-status-data', 'LiveclassController@statusData')
    ->name('liveclass-status-data');
Route::post('liveclass-change-status/{id}', 'LiveclassController@changeStatus')
    ->name('liveclass-change-status');
Route::get('liveclass-change-time/{id}', 'LiveclassController@showChangeTimeForm')
    ->name('liveclass-change-time');
Route::post('liveclass-change-time/{id}', 'LiveclassController@changeTime');

Route::get('/liveclass-edit/{id}', 'LiveclassController@edit')
    ->name('liveclass-edit');
Route::patch('/liveclass-update/{id}', 'LiveclassController@update')
    ->name('liveclass-update');
Route::get('liveclass-delete/{id}', 'LiveclassController@delete')
    ->name('liveclass-delete');
Route::delete('/liveclass-destroy/{id}', 'LiveclassController@destroy')
    ->name('liveclass-destroy');