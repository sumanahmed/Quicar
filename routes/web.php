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

    // Route::get('/car-types', 'Web\AdminController@carTypes')->name('backend.car_types');
    // Route::get('/car-types-create', 'Web\AdminController@carTypesCreate')->name('backend.car_types.create');
    // Route::post('/car-types-store', 'Web\AdminController@carTypesStore')->name('backend.car_types.store');
    // Route::get('/car-types-edit/{car_type_id}', 'Web\AdminController@carTypesEdit')->name('backend.car_types.edit');
    // Route::post('/car-types-update', 'Web\AdminController@carTypesUpdate')->name('backend.car_types.update');
    // Route::post('/car-types-delete', 'Web\AdminController@carTypesDelete')->name('backend.car_types.delete');
    // Route::get('/banner', 'Web\AdminController@getBanner')->name('backend.banner');
    // Route::get('/banner-create', 'Web\AdminController@bannerCreate')->name('backend.banner.create');
    // Route::post('/banner-store', 'Web\AdminController@bannerStore')->name('backend.banner.store');
    // Route::get('/banner-edit/{banner_id}', 'Web\AdminController@bannerEdit')->name('backend.banner.edit');
    // Route::post('/banner-update', 'Web\AdminController@bannerUpdate')->name('backend.banner.update');
    // Route::post('/banner-delete', 'Web\AdminController@bannerDelete')->name('backend.banner.delete');
    // Route::get('/package', 'Web\AdminController@package')->name('backend.package');
    // Route::get('/package-edit/{package_id}', 'Web\AdminController@packageEdit')->name('backend.package.edit');
    // Route::post('/package-update', 'Web\AdminController@packageUpdate')->name('backend.package.update');
    // Route::post('/package-delete', 'Web\AdminController@packageDelete')->name('backend.package.delete');
    // Route::get('/top-destination', 'Web\AdminController@topDestination')->name('backend.top-destination');
    // Route::get('/top-destination-create', 'Web\AdminController@topDestinationCreate')->name('backend.top-destination.create');
    // Route::post('/top-destination-store', 'Web\AdminController@topDestinationStore')->name('backend.top-destination.store');
    // Route::get('/top-destination-edit/{top_destination_id}', 'Web\AdminController@topDestinationEdit')->name('backend.top-destination.edit');
    // Route::post('/top-destination-update', 'Web\AdminController@topDestinationUpdate')->name('backend.top-destination.update');
    // Route::post('/top-destination-delete', 'Web\AdminController@topDestinationDelete')->name('backend.top-destination.delete');
});

Route::group(['prefix'=>'admin/cars', 'middleware' => 'admin'], function(){
    Route::get('/', 'Web\CarController@index')->name('backend.car.index');
    Route::get('/edit/{id}', 'Web\CarController@edit')->name('backend.car.edit');
    Route::post('/update/{id}', 'Web\CarController@update')->name('backend.car.update');
});

Route::group(['prefix'=>'admin/drivers', 'middleware' => 'admin'], function(){
    Route::get('/', 'Web\DriverController@index')->name('backend.driver.index');
});

Route::group(['prefix'=>'admin/owners', 'middleware' => 'admin'], function(){
    Route::get('/', 'Web\OwnerController@index')->name('backend.owner.index');
    Route::get('/status/update', 'Web\OwnerController@statusUpdate')->name('backend.owner.status.update');
});

Route::group(['prefix'=>'admin/users', 'middleware' => 'admin'], function(){
    Route::get('/', 'Web\UserController@index')->name('backend.user.index');
    Route::get('/status/update', 'Web\UserController@statusUpdate')->name('backend.user.status.update');
});

Route::group(['prefix'=>'admin/brands', 'middleware' => 'admin'], function(){
    Route::get('/', 'Web\CarBrandController@index')->name('backend.brand.index');
    Route::post('/store', 'Web\CarBrandController@store')->name('backend.brand.store');
    Route::post('/update', 'Web\CarBrandController@store')->name('backend.brand.update');
    Route::post('/destroy', 'Web\CarBrandController@destroy')->name('backend.brand.destroy');
});