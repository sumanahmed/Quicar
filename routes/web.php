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
    Route::get('/details/{id}', 'Web\CarController@details')->name('backend.car.details');
    Route::get('/expired', 'Web\CarController@expired')->name('backend.car.expired');
});

Route::group(['prefix'=>'admin/drivers', 'middleware' => 'admin'], function(){
    Route::get('/', 'Web\DriverController@index')->name('backend.driver.index');
    Route::post('/store', 'Web\DriverController@store')->name('backend.driver.store');
    Route::post('/update', 'Web\DriverController@update')->name('backend.driver.update');
    Route::post('/destroy', 'Web\DriverController@destroy')->name('backend.driver.destroy');
});

Route::group(['prefix'=>'admin/owners', 'middleware' => 'admin'], function(){
    Route::get('/', 'Web\OwnerController@index')->name('backend.owner.index');
    Route::get('/status/update', 'Web\OwnerController@statusUpdate')->name('backend.owner.status.update');
    Route::post('/notification/send', 'Web\OwnerController@notificationSend')->name('backend.owner.notification.send');
    Route::get('/details/{owner_id}', 'Web\OwnerController@details')->name('backend.owner.details');
});

Route::group(['prefix'=>'admin/users', 'middleware' => 'admin'], function(){
    Route::get('/', 'Web\UserController@index')->name('backend.user.index');
    Route::get('/status/update', 'Web\UserController@statusUpdate')->name('backend.user.status.update');
    Route::post('/notification/send', 'Web\UserController@notificationSend')->name('backend.user.notification.send');
});

Route::group(['prefix'=>'admin/car_type', 'middleware' => 'admin'], function(){
    Route::get('/', 'Web\CarTypeController@index')->name('backend.car_type.index');
    Route::post('/store', 'Web\CarTypeController@store')->name('backend.car_type.store');
    Route::post('/update', 'Web\CarTypeController@update')->name('backend.car_type.update');
    Route::post('/destroy', 'Web\CarTypeController@destroy')->name('backend.car_type.destroy');
});

Route::group(['prefix'=>'admin/home_banner', 'middleware' => 'admin'], function(){
    Route::get('/', 'Web\HomeBannerController@index')->name('backend.home_banner.index');
    Route::post('/store', 'Web\HomeBannerController@store')->name('backend.home_banner.store');
    Route::post('/update', 'Web\HomeBannerController@update')->name('backend.home_banner.update');
    Route::post('/destroy', 'Web\HomeBannerController@destroy')->name('backend.home_banner.destroy');
});

Route::group(['prefix'=>'admin/home_offer', 'middleware' => 'admin'], function(){
    Route::get('/', 'Web\HomeOfferController@index')->name('backend.home_offer.index');
    Route::post('/store', 'Web\HomeOfferController@store')->name('backend.home_offer.store');
    Route::post('/update', 'Web\HomeOfferController@update')->name('backend.home_offer.update');
    Route::post('/destroy', 'Web\HomeOfferController@destroy')->name('backend.home_offer.destroy');
});

Route::group(['prefix'=>'admin/package', 'middleware' => 'admin'], function(){
    Route::get('/', 'Web\PackageController@index')->name('backend.package.index');
    Route::post('/add-remove', 'Web\PackageController@addRemove')->name('backend.package.add_remove');
    Route::post('/destroy', 'Web\PackageController@destroy')->name('backend.home_offer.destroy');
});

Route::group(['prefix'=>'admin/car/package', 'middleware' => 'admin'], function(){
    Route::get('/', 'Web\CarPackageController@index')->name('backend.car.package.index');
    Route::get('/create', 'Web\CarPackageController@create')->name('backend.car.package.create');
    Route::post('/store', 'Web\CarPackageController@store')->name('backend.car.package.store');
    Route::get('/edit/{id}', 'Web\CarPackageController@edit')->name('backend.car.package.edit');
    Route::post('/update/{id}', 'Web\CarPackageController@update')->name('backend.car.package.update');
    Route::get('/destroy/{id}', 'Web\CarPackageController@destroy')->name('backend.car.package.destroy');
    Route::get('/district/spot/{id}', 'Web\CarPackageController@districtSpot')->name('backend.car.package.district_spot');    
});

Route::get('/get-car/{id}', 'Web\CarPackageController@getCar')->name('backend.owner.car');

Route::group(['prefix'=>'admin/brands', 'middleware' => 'admin'], function(){
    Route::get('/', 'Web\CarBrandController@index')->name('backend.brand.index');
    Route::post('/store', 'Web\CarBrandController@store')->name('backend.brand.store');
    Route::post('/update', 'Web\CarBrandController@update')->name('backend.brand.update');
    Route::post('/destroy', 'Web\CarBrandController@destroy')->name('backend.brand.destroy');
});

Route::group(['prefix'=>'admin/models', 'middleware' => 'admin'], function(){
    Route::get('/', 'Web\CarModelController@index')->name('backend.model.index');
    Route::post('/store', 'Web\CarModelController@store')->name('backend.model.store');
    Route::post('/update', 'Web\CarModelController@update')->name('backend.model.update');
    Route::post('/destroy', 'Web\CarModelController@destroy')->name('backend.model.destroy');
});

Route::group(['prefix'=>'admin/car/years', 'middleware' => 'admin'], function(){
    Route::get('/', 'Web\CarYearController@index')->name('backend.car.year.index');
    Route::get('/create', 'Web\CarYearController@create')->name('backend.car.year.create');
    Route::post('/store', 'Web\CarYearController@store')->name('backend.car.year.store');
    Route::post('/update', 'Web\CarYearController@update')->name('backend.car.year.update');
    Route::post('/destroy', 'Web\CarYearController@destroy')->name('backend.car.year.destroy');
});

Route::group(['prefix'=>'admin/year', 'middleware' => 'admin'], function(){
    Route::get('/', 'Web\YearController@index')->name('backend.year.index');
    Route::post('/store', 'Web\YearController@store')->name('backend.year.store');
    Route::post('/update', 'Web\YearController@update')->name('backend.year.update');
    Route::post('/destroy', 'Web\YearController@destroy')->name('backend.year.destroy');
});

Route::group(['prefix'=>'admin/class', 'middleware' => 'admin'], function(){
    Route::get('/', 'Web\CarClassController@index')->name('backend.class.index');
    Route::post('/store', 'Web\CarClassController@store')->name('backend.class.store');
    Route::post('/update', 'Web\CarClassController@update')->name('backend.class.update');
    Route::post('/destroy', 'Web\CarClassController@destroy')->name('backend.class.destroy');
});

Route::group(['prefix'=>'admin/colors', 'middleware' => 'admin'], function(){
    Route::get('/', 'Web\CarColorController@index')->name('backend.color.index');
    Route::post('/store', 'Web\CarColorController@store')->name('backend.color.store');
    Route::post('/update', 'Web\CarColorController@update')->name('backend.color.update');
    Route::post('/destroy', 'Web\CarColorController@destroy')->name('backend.color.destroy');
});

Route::group(['prefix'=>'admin/districts', 'middleware' => 'admin'], function(){
    Route::get('/', 'Web\CarDistrictController@index')->name('backend.district.index');
    Route::post('/store', 'Web\CarDistrictController@store')->name('backend.district.store');
    Route::post('/update', 'Web\CarDistrictController@update')->name('backend.district.update');
    Route::post('/destroy', 'Web\CarDistrictController@destroy')->name('backend.district.destroy');
});

Route::group(['prefix'=>'admin/tour-spot', 'middleware' => 'admin'], function(){
    Route::get('/', 'Web\SpotController@index')->name('backend.spot.index');
    Route::post('/store', 'Web\SpotController@store')->name('backend.spot.store');
    Route::post('/update', 'Web\SpotController@update')->name('backend.spot.update');
    Route::post('/destroy', 'Web\SpotController@destroy')->name('backend.spot.destroy');
});

Route::group(['prefix'=>'admin/accounts', 'middleware' => 'admin'], function(){
    Route::get('/income', 'Web\IncomeController@index')->name('backend.account.income');
    Route::get('/user/account', 'Web\IncomeController@userAccount')->name('backend.account.user_account');
    Route::get('/user/account/details/{id}', 'Web\IncomeController@userAccountDetails')->name('backend.account.user_account.details');
    Route::get('/owner/account', 'Web\IncomeController@ownerAccount')->name('backend.account.owner_account');
    Route::get('/owner/account/details/{id}', 'Web\IncomeController@ownerAccountDetails')->name('backend.account.owner_account.details');
    Route::get('/withdraw', 'Web\IncomeController@withdraw')->name('backend.account.withdraw');
});

Route::group(['prefix'=>'admin/sms/notification', 'middleware' => 'admin'], function(){
    Route::get('/', 'Web\AdminController@smsNotification')->name('backend.sms_notification.index');
    Route::post('/send', 'Web\AdminController@smsNotificationSend')->name('backend.sms_notification.send');
});

Route::group(['prefix'=>'admin/rides', 'middleware' => 'admin'], function(){
    Route::get('/current-ride', 'Web\RideController@currentRide')->name('backend.ride.current_ride');
    Route::get('/current-ride/{ride_id}', 'Web\RideController@currentRideDetails')->name('backend.ride.current_ride_details');
    Route::get('/schedule-ride', 'Web\RideController@scheduleRide')->name('backend.ride.schedule_ride');
    Route::get('/ambulance-ride', 'Web\RideController@ambulanceRide')->name('backend.ride.ambulance_ride');
    Route::get('/package-ride', 'Web\RideController@packageRide')->name('backend.ride.package_ride');
});

Route::group(['prefix'=>'admin/feedbacks', 'middleware' => 'admin'], function(){
    Route::get('/', 'Web\FeedbackController@index')->name('backend.feedback.index');
    Route::post('/reply', 'Web\FeedbackController@reply')->name('backend.feedback.reply');
    Route::post('/destroy', 'Web\FeedbackController@destroy')->name('backend.feedback.destroy');
});