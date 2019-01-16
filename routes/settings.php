<?php

Route::get('/', 'SettingsController@index')
    ->name('index');
Route::post('/competency', 'SettingsController@competency')
    ->name('competency');
Route::post('/exam-assign-email', 'SettingsController@examAssignEmail')
    ->name('exam-assign-email');
Route::post('/exam-complete-email', 'SettingsController@examcompleteEmail')
    ->name('exam-complete-email');
Route::post('/quiz-description', 'SettingsController@quizDetails')
    ->name('quiz-description');
Route::post('/follow-description', 'SettingsController@followDetails')
    ->name('follow-description');
Route::post('/course-assign-email', 'SettingsController@courseAssignEmail')
    ->name('course-assign-email');
Route::post('/course-complete-email', 'SettingsController@coursecompleteEmail')
    ->name('course-complete-email');
