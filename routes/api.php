<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('user_register','Api\AuthController@userRegister');
Route::post('user_login','Api\AuthController@userLogin');

Route::group(['prefix'=>'user', 'middleware'=>'api_user_auth' ],function(){
    Route::get('/logout', 'Api\UserController@logout');
});