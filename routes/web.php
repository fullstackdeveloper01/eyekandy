<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', 'FrontEndController@index')->name('front');
Route::get('/'.env('URL_ROUTE','restaurant').'/{alias}', 'FrontEndController@restorant')->name('vendor');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/listing', 'ListingController@index')->name('listing');

Route::get('/birthday', 'BirthdayController@index')->name('birthday');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController');
    Route::get('user-inactive/{id}/{id1}', 'UserController@inactive')->name('user.inactive');
    Route::get('user-active/{id}/{id1}', 'UserController@inactive')->name('user.active');

    Route::post('/user/push', 'UserController@checkPushNotificationId');
    Route::get('user-review/{id}', 'UserController@review')->name('user.review');
    Route::get('/reviewStatus/{id}/{status}','UserController@reviewStatus');

    Route::resource('users', 'UserController');

    Route::get('/users/details', 'UserController@details')->name('details');
    
    Route::resource('country', 'CountryController');
    Route::get('getCountry/{id?}', 'CountryController@getCountry')->name('getCountry');
    
    Route::resource('state', 'StateController');
    Route::get('getState/{id?}', 'StateController@getState')->name('getState');
    
    Route::resource('city', 'CityController');
    Route::get('getCity/{id?}', 'CityController@getCity')->name('getCity');


    Route::resource('gallery', 'GalleryController');
    
    Route::resource('darshan', 'DarshanController');

    Route::post('darshan/destroy/{id}','DarshanController@destroy');
    Route::get('darshan/edit/{id}','DarshanController@edit');
    Route::post('darshan/update/{id}','DarshanController@update');

    Route::resource('bank', 'BankController');
    
    Route::resource('shift', 'ShiftController');

    Route::resource('status', 'StatusController');

    Route::resource('zone', 'ZoneController');
    
    Route::resource('vehicle', 'VehicleController');

    Route::resource('pickhours', 'PickHoursController');

    Route::resource('package', 'PackageController');

    Route::resource('event', 'EventsController');

    Route::resource('clients', 'ClientController');
    
    Route::resource('orders', 'OrderController');
    
    Route::resource('appSettings', 'AppSettingsController');

    Route::resource('customerSupport', 'CustomerSupportController');
    
    // Route::put('customerSupport-update/{id}', 'CustomerSupportController@update')->name('customerSupport.update');

    Route::resource('aboutUs', 'AboutUsController');
    // Route::put('aboutUs-update/{id}', 'AboutUsController@update')->name('aboutUs.update');
    
    Route::resource('termsCondition', 'TermsConditionController');

    Route::resource('policy', 'PolicyController');
    
    Route::resource('faq', 'FaqController');

    Route::resource('hour', 'HourController');

    Route::resource('party', 'PartytypeController');

    Route::resource('venue', 'VenueController');

    Route::resource('support_topic', 'supporttopicController');

    Route::resource('girls', 'GirlsController');
    Route::get('delete/{id}', 'GirlsController@trash')->name('girls.delete');
    Route::get('toprated/{id}/{id1}', 'GirlsController@rated')->name('toprated');

    Route::resource('settlement', 'SettlementController');
    Route::post('settlement-form-submit', 'SettlementController@settlementPost');
    Route::get('/settlement/getSettlementPrice/{id}','SettlementController@getSettlementPrice');

    Route::resource('cashInHand', 'CashInHandController');

    Route::get('/cashInHand/getCashInHand/{id}','CashInHandController@getCashInHand');

    Route::get('/cashInHand/driverSettelmentStatus/{did}/{status}','CashInHandController@driverSettelmentStatus');

    Route::get('ordertracingapi/{order}', 'OrderController@orderLocationAPI');
    
    Route::get('liveapi', 'OrderController@liveapi');

    Route::get('live', 'OrderController@live');
    
    Route::get('/updatestatus/{alias}/{order}', ['as' => 'update.status', 'uses'=>'OrderController@updateStatus']);

    Route::resource('settings', 'SettingsController');

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);

    //Route::get('appSettings', ['as' => 'appSettings.edit', 'uses' => 'AppSettingsController@edit']);
    
    //Route::put('appSettings', ['as' => 'appSettings.update', 'uses' => 'AppSettingsController@update']);
    
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

    Route::resource('items', 'ItemsController');
    Route::get('/items/list/{restorant}', 'ItemsController@indexAdmin')->name('items.admin');
    Route::post('/import/items', 'ItemsController@import')->name('import.items');
    Route::post('/item/change/{item}', 'ItemsController@change');

    Route::resource('categories', 'CategoriesController');

    Route::resource('subCategories', 'SubCategoriesController');

    Route::resource('topsubcategory', 'TopSubCategoryController');

    Route::resource('advertisement', 'AdvertisementController');
    Route::get('ads-requested', 'AdvertisementController@requested')->name('advertisement.requested');
    Route::get('approve-request/{id}', 'AdvertisementController@approve_request')->name('advertisement.approve_request');

    Route::resource('addresses', 'AddressControler');
    //Route::post('/order/address','AddressControler@orderAddress')->name('order.address');
    Route::get('/new/address/autocomplete','AddressControler@newAddressAutocomplete');
    Route::post('/new/address/details','AddressControler@newAdressPlaceDetails');

    Route::post('/change/{page}', 'PagesController@change')->name('changes');

    Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
    Route::get('/payment','PaymentController@view')->name('payment.view');
    Route::post('/make/payment','PaymentController@payment')->name('make.payment');

    Route::get('/cart-checkout', 'CartController@cart')->name('cart.checkout');



});
Route::get('/subcategory_list/{id}', 'TopSubCategoryController@getSubCategoryList');

Route::get('/footer-pages', 'PagesController@getPages');
Route::get('/cart-getContent', 'CartController@getContent')->name('cart.getContent');
Route::post('/cart-add', 'CartController@add')->name('cart.add');
Route::post('/cart-remove', 'CartController@remove')->name('cart.remove');
Route::get('/cart-update', 'CartController@update')->name('cart.update');
Route::get('/cartinc/{item}', 'CartController@increase')->name('cart.increase');
Route::get('/cartdec/{item}', 'CartController@decrease')->name('cart.decrease');

Route::post('/order', 'OrderController@store')->name('order.store');

Route::resource('pages', 'PagesController');

Route::get('/login/google', 'Auth\LoginController@googleRedirectToProvider')->name('google.login');
Route::get('/login/google/redirect', 'Auth\LoginController@googleHandleProviderCallback');

Route::get('/login/facebook', 'Auth\LoginController@facebookRedirectToProvider')->name('facebook.login');
Route::get('/login/facebook/redirect', 'Auth\LoginController@facebookHandleProviderCallback');

Route::get('/new/restaurant/register', 'RestorantController@showRegisterRestaurant')->name('newrestaurant.register');
Route::post('/new/restaurant/register/store', 'RestorantController@storeRegisterRestaurant')->name('newrestaurant.store');


/** listing status*/

Route::get('/listingStatus/{id}/{status}','ListingController@status');
Route::get('/userStatus/{id}/{status}','UserController@status');