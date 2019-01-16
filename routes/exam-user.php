<?php

Route::get('/{id}', 'ExamUserController@show')
    ->name('show');
    
 Route::get('/certificate/{exam_user_id}', 'ExamUserController@certificate');
 
