<?php

Auth::routes();

Route::get('auth/logout', function() {
    Auth::logout();
    return redirect('/');
});

Route::get('/home', function () {
    return redirect('/');
})->middleware('auth');

Route::group(['middleware' => 'auth'], function() {
    // set opening balance
    Route::get('/opening_balance', 'HomeController@setOpeningBalance');
    Route::post('/opening_balance', 'HomeController@saveOpeningBalance');

    // set closing balance
    Route::get('/closing_balance', 'HomeController@setClosingBalance');
    Route::post('/closing_balance', 'HomeController@saveClosingBalance');
    // show active shift balance
    Route::get('/data/journal','TransactionController@journal');
    Route::get('/journal', 'TransactionController@transactionJournal');

    // stats
    Route::group(['prefix' => 'stats'], function() {
        Route::get('income','StatsController@income');
        Route::get('outcome','StatsController@outcome');
    });

});

Route::group(['middleware' => ['auth','role','staff']], function() {

    // dashboard
    Route::get('/', 'HomeController@index');

    // user
    Route::group(['prefix' => 'user'], function() {
        Route::get('/', 'UserController@index');
        Route::get('/add', 'UserController@add');
        Route::post('/add/shift','UserController@addShift');
        Route::post('/addUser','UserController@addUser');
        Route::post('/add/supplier','UserController@addSupplier');

        Route::get('edit/{userId}','UserController@edit');
        Route::post('editUser/{userId}','UserController@editUser');

        Route::post('/delete/{userId}','UserController@deleteUser');

        Route::get('/checkUsername', 'UserController@checkUsername');
    });

    // transaction
    Route::group(['prefix' => 'transaction'], function() {
        Route::get('/', 'TransactionController@index');
        Route::get('/detail/{id}', 'TransactionController@detailTrx');
        Route::get('/add', 'TransactionController@transactionAdd');
        Route::get('/getPrintNote', 'TransactionController@getPrintNote');
        Route::post('/savePrintNote', 'TransactionController@savePrintNote');
        Route::post('/add', 'TransactionController@addTransaction');
        Route::post('/add/goodsCategory','TransactionController@goodsCategory');
        Route::post('/delete/{id}', 'TransactionController@deleteTransaction');
        Route::get('/voucher/{id}','TransactionController@detailVoucher');
        Route::post('/voucher/add','TransactionController@addVoucher');
        Route::post('/paymentMethod/add','TransactionController@addPaymentMethod');
        Route::post('/add/supplier','TransactionController@addSupplier');

        Route::group(['prefix' => 'goods'], function() {
            Route::get('/add', 'TransactionController@addGoods');
            Route::post('/add', 'TransactionController@storeGoods');
            Route::get('/edit/{id}', 'TransactionController@editGoods');
            Route::post('/edit/{id}', 'TransactionController@updateGoods');
            Route::post('/delete/{id}','TransactionController@deleteGoods');

            Route::get('/getPrice/{id}', 'TransactionController@getPrice');
        });

        Route::group(['prefix' => 'spending'], function() {
            Route::get('/detail/{id}', 'TransactionController@detailSpending');
            Route::get('/add', 'TransactionController@addSpending');
            Route::post('/add', 'TransactionController@storeSpending');
            Route::post('/delete/{id}', 'TransactionController@deleteSpending');
        });
    });

    // report
    Route::group(['prefix' => 'report'], function() {
        Route::get('/', 'ReportController@index');
        Route::get('/data/jurnal','ReportController@jurnal');
    });

    // setting
    Route::group(['prefix' => 'setting'], function() {
        Route::get('/', 'SettingController@index');
        Route::post('/grantAccess','SettingController@grantAccess');
    });
});
