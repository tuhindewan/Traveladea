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

Auth::routes();
Route::get('/checkUser', 'HomeController@index');
Route::get('/users/logout','Auth\LoginController@userLogout')->name('user.logout');

Route::get('/test',function(){
    return Auth::user()->test();
});

/*backend section*/


/*Administration section start*/
    /*role section start*/
    Route::resource('/role', 'Backend\RoleController');
    /*role section end*/

    /*permission section start*/
    Route::resource('/permission', 'Backend\PermissionController');
    /*permission section end*/

    /*Role Wise Permission section start*/
    Route::resource('role-wise-permission', 'Backend\RoleWisePermissionController');
    /*Role Wise Permission section end*/


    /* User Admin section start*/
    Route::resource('user-admin', 'Backend\UserAdminController');
    Route::get('user-admin-change-password/{id}', 'Backend\UserAdminController@changePasswordView');
    Route::post('user-admin-change-password/{id}', 'Backend\UserAdminController@changePasswordUpdate');
    //change status
    Route::get('user-admin-status/{id}', 'Backend\UserAdminController@status');
    //delete admin
    Route::get('user-admin-delete/{id}', 'Backend\UserAdminController@destroy');
    /* User Admin section end*/
    /*check access controller start*/
    Route::post('check_access/{adminId}/{type}', 'Backend\CheckAccessController@checkAccess');
    /*check access controller end*/
/*Administration section end*/


/* user post list in admin panel*/

    Route::resource('user-post-admin','Backend\UserPostController');
    Route::post('user-post-access/{postId}/{type}','Backend\UserPostAccessController@UserPostAccess');
    Route::get('post-status/{id}','Backend\UserPostController@status');
    Route::get('post-delete/{id}','Backend\UserPostController@destroy');

    /* user list */

    Route::resource('all_user','Backend\UserListController');
    Route::post('user_access/{userId}/{type}','Backend\UserAccessController@UserAccess');
    Route::get('user-status/{id}','Backend\UserListController@status');
    Route::get('user-delete/{id}','Backend\UserListController@destroy');
/**/


/*settings section start*/
    /*current city section start*/
    Route::resource('current-city', 'Backend\CurrentCityController');
    /*current city  section end*/
    /*web settings section start*/
    Route::resource('web-settings', 'Backend\WebSettingsController');
    /*web settings section end*/

    /*send-system-config section start*/
    Route::resource('send-system-config', 'Backend\SendSystemConfigController');
    /*send-system-config section end*/

    /*password reset email section start*/
    Route::resource('password-reset-email', 'Backend\PasswordResetEmailController');
    /*password reset email section end*/
    /*account apperoval email section start*/
    Route::resource('account-approval-email', 'Backend\AccountApprovalEmailController');
    /*account apperoval email section end*/
    /*account opening email section start*/
    Route::resource('account-opening-email', 'Backend\AccountOpeningEmailController');
    /*account opening email section end*/

    /*smtp settings section start*/
    Route::resource('smtp-settings', 'Backend\SmtpSettingsController');
    /*smtp settings section end*/

    /*page settings section start*/
    Route::resource('page-settings', 'Backend\PageSettingsController');
    /*page settings section end*/
/*settings section end*/

/*message section start*/
    /*news letter secion start*/
    Route::resource('newsletter', 'Backend\NewsletterController');
    /*news letter secion end*/
    /*contact secion start*/
    Route::resource('contact-message', 'Backend\ContactMessageController');
    /*contact secion end*/
/*message section end*/

/*admin announcement section start*/


    Route::resource('admin-announcement','Backend\AnnouncementController');
    Route::post('admin_announcement_access/{postId}/{type}','Backend\AnnouncementAccessController@AnnouncementAccess');
    Route::get('announcement-status/{id}','Backend\AnnouncementController@status');
    Route::get('admin-announcement-delete/{id}','Backend\AnnouncementController@destroy');
/*admin announcement section end*/


Route::prefix('admin')->group(function(){

	Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
	// Password reset routes
	Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
	Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');


});



//
/*backend section*/

//login
Route::get('/login-page', function () {
    return view('backend.login');
});
//welcome
// Route::get('/welcome', function () {

//     return view('backend.welcome');
// });





Route::get('/', function () {
    return redirect('/login');
});


/*front end section*/
    
    Route::resource('users', 'Frontend\UsersController');
    Route::get('users/account-verification/{id}', 'Frontend\UserVerificationController@view');
    Route::post('users.check-code', 'Frontend\UserVerificationController@checkCode');



Route::group(['middleware' =>'auth'], function(){
    
    Route::post('users/re-generate-code', 'Frontend\UsersController@reGenerateCode');

    Route::get('/', 'Frontend\HomePageController@index');

    Route::get('/check-place/{latitude}/{longitude}', 'Frontend\HomePageController@checkPlace');
    Route::get('/place/{place_id}', 'Frontend\HomePageController@placeWisePostShow');

    

    /*user post start*/
    Route::resource('user-post','Frontend\UserPostController');
    Route::post('/post-like','Frontend\UserPostController@postLike');
    //post comment section
    Route::resource('post-comment','Frontend\PostCommentController');

    //Route::post('/post-comment','Frontend\UserPostController@postComment');
    Route::post('/post-comment-delete','Frontend\UserPostController@postCommentDelete');
    Route::post('/post-comment-edit','Frontend\UserPostController@postCommentEdit');
    Route::get('/all-comment/{id}','Frontend\UserPostController@allComment');

    /*post subcomment section*/
    Route::resource('post-sub-comment','Frontend\PostSubCommentController');
    /*user post end*/

    /* personal information */
});

Route::resource('/personal_information','Frontend\PersonalInformationController');


/* User Profile Section*/

Route::get('/profile','Frontend\UserProfileController@index');
Route::get('user-about-section', 'Frontend\UserProfileController@about');
                                                                                                         
Route::get('/edit-profile','Frontend\UserProfileController@getUserProfileInfo');

Route::get('/all_search_list_people','Frontend\AllSearchListController@AllSearchListPeople');
Route::get('/addFriend/{id}','Frontend\AllSearchListController@sendRequest');

/* User Relationship section */
Route::post('send_request','Frontend\AllSearchListController@send_user_request');


/* cover image controller*/

Route::resource('coverimage','Frontend\CoverImageController');

/* all friend requests */
Route::get('/friend_request','Frontend\FriendRequestController@allRequests');
Route::get('/accepterequest/{id}','Frontend\FriendRequestController@accepterequest');


Route::get('/index', function () {

    return view('frontend.index');
});


Route::get('/home-activity', function () {

    return view('frontend.show-page');
});

Route::get('/view_profile', function () {

    return view('frontend.user.view_profile');
});



Route::get('/map', function () {

    return view('frontend.map.index');
});

Route::get('/connection', function () {

    return view('frontend.connection.index');
});

Route::get('/company', function () {

    return view('frontend.company.company');
});

Route::get('/map', function () {

    return view('frontend.map.single_map_select');
});




Route::get('/all_notifications', function () {

    return view('frontend.profile_settings.notifications');
});
Route::get('/all_messages', function () {

    return view('frontend.profile_settings.all_messages');
});

Route::get('/all_activity', function () {

    return view('frontend.profile_settings.activities');
});

Route::get('/change_password', function () {

    return view('frontend.profile_settings.change_password');
});

Route::get('/fav_agencies', function () {

    return view('frontend.profile_settings.fav_agencies');
});


Route::get('/account_settings', function () {

    return view('frontend.profile_settings.account_settings');
});

Route::get('/single_post', function () {

    return view('frontend.profile_settings.single_post');
});



Route::get('/map', function () {

    return view('frontend.map.index');
});

Route::get('/foot_prints', function () {

    return view('frontend.map.foot_prints');
});

Route::get('/connection', function () {

    return view('frontend.connection.index');
});

Route::get('/company', function () {

    return view('frontend.company.company');
});

Route::get('/map', function () {

    return view('frontend.map.single_map_select');
});


Route::get('/user-friends-section', function () {

    return view('frontend.user.user_friends');
});

Route::get('/user-photos-section', function () {

    return view('frontend.user.user_photos');
});

Route::get('/user-videos-section', function () {

    return view('frontend.user.user_videos');
});

Route::get('/error404', function () {

    return view('frontend.error404');
});

/*frontend section end*/




