<?php

Route::post('/upload', 'ContentFileController@upload')->name('upload');
Route::get('/download/{id}', 'ContentFileController@download')->name('download');
