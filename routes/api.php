<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'v1'], function() {

    Route::post('/login', 'API\APIAuthController@login');

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
