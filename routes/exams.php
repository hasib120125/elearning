<?php

Route::get('/', 'ExamController@index')
    ->name('index');
Route::get('/data', 'ExamController@indexData')
    ->name('data');
Route::get('/create', 'ExamController@create')
    ->name('create');
Route::post('/store', 'ExamController@store')
    ->name('store');
Route::get('/edit/{id}', 'ExamController@edit')
    ->name('edit');
Route::patch('/{id}', 'ExamController@update')
    ->name('update');
Route::get('delete/{id}', 'ExamController@delete')
    ->name('delete');
Route::delete('/{id}', 'ExamController@destroy')
    ->name('destroy');

Route::get('assign', 'ExamController@getAssignmentForm')
    ->name('assign');
Route::post('assign', 'ExamController@assign');
Route::get('status', 'ExamController@status')
    ->name('status');
Route::get('status-data', 'ExamController@statusData')
    ->name('status-data');
Route::post('change-status/{id}', 'ExamController@changeStatus')
    ->name('change-status');
Route::get('change-time/{id}', 'ExamController@showChangeTimeForm')
    ->name('change-time');
Route::post('change-time/{id}', 'ExamController@changeTime');

Route::get('get-by-exam-user-id/{id}', 'ExamController@getByExamUserId')
    ->name('get-by-exam-user-id');
Route::get('take/{id}', 'ExamController@take')
    ->name('take');

Route::post('answer/{id}', 'ExamController@answer')
    ->name('answer');

Route::post('set-cur-ques-no/{id}', 'ExamController@setCurQuesNo')
    ->name('set-cur-ques-no');
Route::post('set-last-active-time/{id}', 'ExamController@setLastActiveTime')
    ->name('set-last-active-time');
Route::post('submit/{id}', 'ExamController@submit')
    ->name('submit');

Route::get('finish/{id}', 'ExamController@finish')
    ->name('finish');

Route::get('pending/{user_id?}', 'ExamController@pending')
    ->name('pending');

Route::get('completed/{user_id?}', 'ExamController@completed')
    ->name('completed');

Route::post('/export', 'ExamController@export')
    ->name('export');

Route::get('/export-exam-result', 'ExamController@exportIncompleteExamResult')
    ->name('export-exam-result');

Route::get('/{id}', 'ExamController@show')
    ->name('show');
