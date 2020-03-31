<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin','Web\AuthController@login')->name('backend.admin.login');
Route::post('/admin/signin','Web\AuthController@signin')->name('backend.admin.signin');
Route::post('/admin/logout','Web\AuthController@logout')->name('backend.admin.logout');
Route::group(['prefix'=>'admin', 'middleware' => 'admin'], function(){
    Route::get('/dashboard', 'Web\AdminController@dashboard')->name('backend.dashboard');
    Route::get('/get-upazila/{id}', 'Web\AdminController@getUpazila')->name('backend.get_upazila');
    Route::get('/car-types', 'Web\AdminController@carTypes')->name('backend.car_types');
    Route::post('/car-types-store', 'Web\AdminController@carTypesStore')->name('backend.car_types.store');
    Route::post('/car-types-update', 'Web\AdminController@carTypesUpdate')->name('backend.car_types.update');
});