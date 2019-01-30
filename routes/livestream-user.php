<?php
Route::get('/assign', 'LiveStreamController@showAssignmentForm')
    ->name('assign');
Route::post('/assign', 'LiveStreamController@assign');

Route::get('status', 'LiveStreamController@status')
    ->name('status');
Route::get('status-data', 'LiveStreamController@statusData')
    ->name('status-data');

Route::post('exprot', 'LiveStreamController@exprot')
    ->name('export');

Route::get('change-time/{id}', 'LiveStreamController@showChangeTimeForm')
    ->name('change-time');
Route::post('change-time/{id}', 'LiveStreamController@changeTime');