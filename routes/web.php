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
Route::get('/welcome', function () {

    return view('backend.welcome');
});





Route::get('/', function () {
    return redirect('/login');
});


/*front end section*/
    
    Route::resource('users', 'Frontend\UsersController');
    Route::get('users/account-verification/{id}', 'Frontend\UserVerificationController@view');
Route::group(['middleware' =>'auth'], function(){
    
    Route::post('users.check-code', 'Frontend\UserVerificationController@checkCode');
    Route::post('users/re-generate-code', 'Frontend\UsersController@reGenerateCode');

    Route::get('/home-user', function () {

        return view('frontend.home-test');
    });
});


Route::get('/index', function () {

    return view('frontend.index');
});


Route::get('/home-activity', function () {

    return view('frontend.show-page');
});

Route::get('/view_profile', function () {

    return view('frontend.user.view_profile');
});

Route::get('/profile', function () {

    return view('frontend.user.index');
});
Route::get('/edit-profile', function () {

    return view('frontend.user.edit_profile');
});

Route::get('/map', function () {

    return view('frontend.map.index');
});

Route::get('/connection', function () {

    return view('frontend.connection.index');
});

Route::get('/company', function () {

    return view('frontend.company.index');
});


/*frontend section end*/




