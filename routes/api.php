<?php
// -----------------------New apis For Eye Kandy -----------------------------------
Route::post('register','ApiController@register');

Route::post('login','ApiController@login');

Route::post('forgotpassword','ApiController@forgotpassword');

Route::get('about_us','ApiController@about_us');

Route::get('term_condition','ApiController@term_condition');

Route::get('contact_support','ApiController@contact_support');
  
Route::get('privacy_policy','ApiController@policy');

Route::get('faq','ApiController@faq');

Route::get('packages','ApiController@getpackage');

Route::get('hour_time','ApiController@gethoursTime');

Route::get('party_type','ApiController@getpartyType');

Route::get('venue','ApiController@getVenue');


Route::group(['middleware' => ['jwt.verify']], function() {
    
    Route::post('userdetails', 'ApiController@userdetails');

    Route::post('image_upload','ApiController@imageUpload');

    Route::post('profile','ApiController@profileupdate');
    
    Route::post('logout', 'ApiController@logout');

    Route::post('girls', 'ApiController@girls');

    Route::post('event_girls', 'ApiController@eventGirls');

    Route::post('country', 'ApiController@getCountry');

    Route::post('state', 'ApiController@getState');
    
    Route::post('city', 'ApiController@getcity');

    Route::post('addcard_details', 'ApiController@addcardDetails');

    Route::post('card_list', 'ApiController@getcardList');

    Route::post('delete_card', 'ApiController@deleteCard');

    Route::post('create_event', 'ApiController@addEvent');

    Route::post('event_list', 'ApiController@getEvent');

    Route::post('event_details', 'ApiController@getEventdetails');

    Route::post('addsupport', 'ApiController@addSupport');

    Route::post('support_list', 'ApiController@getSupport');

    Route::post('support_topic', 'ApiController@getSupporttopic');

    // -----------------------old apis For Eye Kandy -----------------------------------

    Route::post('verify_otp','UserApiController@verify_otp');

    Route::post('favorites','UserApiController@get_favorite');

    Route::post('favorite','UserApiController@favorite');

    Route::post('review_submit','UserApiController@review_submit');

    Route::post('/eventDetails', 'UserApiController@eventDetails');

    Route::post('notification', 'UserApiController@notification');

    Route::post('read-notification', 'UserApiController@read_notification');

    Route::post('order-history', 'UserApiController@orderhistory');

});

// -----------------------old apis For Eye Kandy -----------------------------------

Route::get('/latest_event', 'UserApiController@latestEvent');

Route::get('/latest_updated_event', 'UserApiController@latestUpdatedEvent');

Route::get('/oldest_updated_event', 'UserApiController@oldestUpdatedEvent');

Route::get('/category_list', 'UserApiController@getCategoryList');

Route::get('/all_event', 'UserApiController@allEvent');

Route::post('token_expired','UserApiController@token_expired');

Route::post('/payment_token', 'UserApiController@payment_token');

Route::post('/search', 'UserApiController@search');



Route::post('match_otp','UserApiController@match_otp');

// Route::post('login','UserApiController@login');

Route::post('authenticate','UserApiController@authenticate');

Route::post('resend_otp','UserApiController@resend_otp');

Route::post('send_otp','UserApiController@send_otp');

Route::get('/advertisement', 'UserApiController@getAdvertisementList');

Route::post('/recentsearch', 'UserApiController@getrecentsearchList');

Route::post('/add_recentsearch', 'UserApiController@addrecentsearch');

Route::post('/delete_recentsearch', 'UserApiController@deleterecentsearch');


