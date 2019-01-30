<?php

Route::get('/assign', 'CourseUserController@showAssignmentForm')
    ->name('assign');
Route::post('/assign', 'CourseUserController@assign');

Route::get('status', 'CourseUserController@status')
    ->name('status');
Route::get('status-data', 'CourseUserController@statusData')
    ->name('status-data');

Route::post('exprot', 'CourseUserController@exprot')
    ->name('export');

Route::get('change-time/{id}', 'CourseUserController@showChangeTimeForm')
    ->name('change-time');
Route::post('change-time/{id}', 'CourseUserController@changeTime');

Route::get('certificate/{id}', 'CourseUserController@certificate')
    ->name('certificate');
Route::get('certificatepdf/{id}', 'CourseUserController@certificatepdf')
    ->name('certificatepdf');
