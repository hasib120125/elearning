<?php
    Route::get('/', 'LiveStreamController@index')
        ->name('index');
    Route::get('/data', 'LiveStreamController@indexData')
        ->name('data');
    Route::get('/create', 'LiveStreamController@create')
        ->name('create');
    Route::post('/store', 'LiveStreamController@store')
        ->name('store');
    Route::get('/edit/{id}', 'LiveStreamController@edit')
        ->name('edit');
    Route::patch('/{id}', 'LiveStreamController@update')
        ->name('update');
    Route::get('delete/{id}', 'LiveStreamController@delete')
        ->name('delete');
    Route::delete('/{id}', 'LiveStreamController@destroy')
        ->name('destroy');
    
    Route::get('assign', 'LiveStreamController@getAssignmentForm')
        ->name('assign');
    Route::post('assign', 'LiveStreamController@assign');
    Route::get('status', 'LiveStreamController@status')
        ->name('status');
    Route::get('status-data', 'LiveStreamController@statusData')
        ->name('status-data');
    Route::post('change-status/{id}', 'LiveStreamController@changeStatus')
        ->name('change-status');
    Route::get('change-time/{id}', 'LiveStreamController@showChangeTimeForm')
        ->name('change-time');
    Route::post('change-time/{id}', 'LiveStreamController@changeTime');
    
    Route::get('get-by-exam-user-id/{id}', 'LiveStreamController@getByExamUserId')
        ->name('get-by-exam-user-id');
    Route::get('take/{id}', 'LiveStreamController@take')
        ->name('take');
    
    Route::post('answer/{id}', 'LiveStreamController@answer')
        ->name('answer');
    
    Route::post('set-cur-ques-no/{id}', 'LiveStreamController@setCurQuesNo')
        ->name('set-cur-ques-no');
    Route::post('set-last-active-time/{id}', 'LiveStreamController@setLastActiveTime')
        ->name('set-last-active-time');
    Route::post('submit/{id}', 'LiveStreamController@submit')
        ->name('submit');
    
    Route::get('finish/{id}', 'LiveStreamController@finish')
        ->name('finish');
    
    Route::get('pending/{user_id?}', 'LiveStreamController@pending')
        ->name('pending');
    
    Route::get('completed/{user_id?}', 'LiveStreamController@completed')
        ->name('completed');
    
    Route::post('/export', 'LiveStreamController@export')
        ->name('export');
    
    Route::get('/export-exam-result', 'LiveStreamController@exportIncompleteExamResult')
        ->name('export-exam-result');
    
    Route::get('/{id}', 'LiveStreamController@show')
        ->name('show');