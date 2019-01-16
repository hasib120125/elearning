<?php

Route::get('/user-result', 'ReportController@userResult')
    ->name('user-result');
Route::get('/user-result-data', 'ReportController@userResultData')
    ->name('user-result-data');
Route::post('/export-user-result', 'ReportController@exportUserResult')
    ->name('export-user-result');

Route::get('/exam-result', 'ReportController@examResult')
    ->name('exam-result');
Route::get('/exam-result-data', 'ReportController@examResultData')
    ->name('exam-result-data');
Route::post('/export-exam-result', 'ReportController@exportExamResult')
    ->name('export-exam-result');

Route::post('/export-incomplete-exam-result', 'ReportController@exportIncompleteExamResult')
    ->name('export-incomplete-exam-result');
