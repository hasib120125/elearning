<?php
    Route::get('/', 'UserController@index')
        ->name('index');
    Route::get('/data', 'UserController@indexData')
        ->name('data');

    Route::patch('/change-status', ['as' => 'users.change-status',
    'uses' => 'UserController@changeStatus', ]);

    Route::get('/create', 'UserController@create')
        ->name('create');
    Route::post('/', 'UserController@store')
        ->name('store');

    Route::get('/create-bulk', 'UserController@createBulk')
        ->name('create-bulk');

    Route::post('/store-bulk', 'UserController@storeBulk')
        ->name('store-bulk');

    Route::get('/edit/{id}', 'UserController@edit')
        ->name('edit');
    Route::patch('/{id}', 'UserController@update')
        ->name('update');

    Route::get('/edit-bulk', 'UserController@editBulk')
        ->name('edit-bulk');
    Route::post('/update-bulk', 'UserController@updateBulk')
        ->name('update-bulk');

    Route::get('delete/{id}', 'UserController@delete')
        ->name('delete');
    Route::delete('/{id}', 'UserController@destroy')
        ->name('destroy');

    Route::get('/delete-bulk', 'UserController@deleteBulk')
        ->name('delete-bulk');
    Route::post('/destroy-bulk', 'UserController@destroyBulk')
        ->name('destroy-bulk');

    Route::get('/export', 'UserController@showExportForm')
        ->name('export');
    Route::post('/export', 'UserController@export')
        ->name('export');

    Route::get('/{id}', ['as' => 'users.show',
    'uses' => 'UserController@show', ]);
