<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('user_register','Api\AuthController@userRegister');
Route::post('user_login','Api\AuthController@userLogin');
Route::post('owner_register','Api\AuthController@ownerRegister');
Route::post('owner_login','Api\AuthController@ownerLogin');
Route::get('get_car_types','Api\CarTypeController@getCarTypes');
Route::get('get_banners','Api\UserController@getBanner');
Route::get('get_packages','Api\PackageController@index');
Route::get('get_top_destinations','Api\TopDestinationController@index');
Route::get('get_cars','Api\DriverController@getCars');

Route::group(['prefix'=>'user', 'middleware'=>'api_user_auth' ],function(){
    Route::get('/logout', 'Api\UserController@logout');
    Route::get('/detail', 'Api\UserController@detail');
});

Route::group(['prefix'=>'owner', 'middleware'=>'api_owner_auth' ],function(){
    Route::get('/logout', 'Api\OwnerController@logout');
    Route::get('/detail', 'Api\OwnerController@detail');
    Route::post('/driver_register', 'Api\DriverController@driverRegister');
    Route::post('/car_register', 'Api\DriverController@carRegister');
    Route::apiResource('/packages', 'Api\PackageController');
});