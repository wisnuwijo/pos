<?php

Auth::routes();

Route::get('auth/logout', function() {
    Auth::logout();
    return redirect('/');
});

Route::group(['middleware' => ['auth','role']], function() {

    // dashboard
    Route::get('/', 'HomeController@index');

    // user
    Route::group(['prefix' => 'user'], function() {
        Route::get('/', 'UserController@index');
        Route::get('/add', 'UserController@add');
        Route::post('/add/shift','UserController@addShift');
        Route::post('/addUser','UserController@addUser');

        Route::get('edit/{userId}','UserController@edit');
        Route::post('editUser/{userId}','UserController@editUser');

        Route::post('/delete/{userId}','UserController@deleteUser');

        Route::get('/checkUsername', 'UserController@checkUsername');
    });

    // transaction
    Route::group(['prefix' => 'transaction'], function() {
        Route::get('/', 'TransactionController@index');
    });


    // setting
    Route::group(['prefix' => 'setting'], function() {
        Route::get('/', 'SettingController@index');
        Route::post('/grantAccess','SettingController@grantAccess');
    });
});
