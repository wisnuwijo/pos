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
    });

    // setting
    Route::group(['prefix' => 'setting'], function() {
        Route::get('/', 'SettingController@index');
        Route::post('/grantAccess','SettingController@grantAccess');
    });
});
