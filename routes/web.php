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

Route::get('/', function () {
    return view('welcome');
});

// // Authentication Routes...
Route::get('admin', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('admin', 'Auth\LoginController@login')->name('signIn');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register')->name('register');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::group(['middleware' => ['checkAuth']], function ()
{
	Route::group(['middleware' => ['checkAdmin']], function ()
	{
        Route::prefix('panel')->group(function ()
        {
		    Route::get('/',array(
		          'as'=>'admin.home.index',
		          'uses'=>'Admin\AdminController@index'
                  ));

            /* Media */
		    Route::get('/media',array(
                'as'=>'admin.media.index',
                'uses'=>'Admin\MediaController@index'
                ));
            Route::post('/media_upload',array(
                'as'=>'admin.media.upload',
                'uses'=>'Admin\MediaController@uploadSubmit'
                ));
            Route::post('/media_delete',array(
                'as'=>'admin.media.delete',
                'uses'=>'Admin\MediaController@deleteFile'
                ));

            /* Vision */
            Route::get('/vision',array(
                'as'=>'admin.vision.index',
                'uses'=>'Admin\VisionController@index'
                ));
            Route::post('/vision/update',array(
                'as'=>'admin.vision.update',
                'uses'=>'Admin\VisionController@update'
                ));

            /* Settings */
			Route::get('/settings',array(
				'as'=>'admin.settings.index',
				'uses'=>'Admin\SettingsController@index'
				));
			Route::post('/settings/update/{id}',array(
				'as'=>'admin.settings.update',
				'uses'=>'Admin\SettingsController@update'
				));

            /* Slides */
			Route::get('/slides',array(
				'as'=>'admin.slides.index',
				'uses'=>'Admin\SlideController@index'
				));
			Route::get('/slides/{id}',array(
				'as'=>'admin.slides.edit',
				'uses'=>'Admin\SlideController@edit'
				));
			Route::post('/slides/{id}/update',array(
				'as'=>'admin.slides.update',
				'uses'=>'Admin\SlideController@update'
				));
			Route::post('/slides/save',array(
				'as'=>'admin.slides.save',
				'uses'=>'Admin\SlideController@save'
				));
			Route::post('/slides/delete',array(
				'as'=>'admin.slides.delete',
				'uses'=>'Admin\SlideController@delete'
                ));

            /* Slides Text */
			Route::get('/slides/{id}/text',array(
				'as'=>'admin.slides.text.index',
				'uses'=>'Admin\SlideTextController@index'
				));
            Route::get('/slides/{slide_id}/text/{id}',array(
                'as'=>'admin.slides.text.edit',
                'uses'=>'Admin\SlideTextController@edit'
                ));
            Route::post('/slides/text/{id}/update',array(
                'as'=>'admin.slides.text.update',
                'uses'=>'Admin\SlideTextController@update'
                ));
            Route::post('/slides/text/save',array(
                'as'=>'admin.slides.text.save',
                'uses'=>'Admin\SlideTextController@save'
                ));
            Route::post('/slides/text/delete',array(
                'as'=>'admin.slides.text.delete',
                'uses'=>'Admin\SlideTextController@delete'
                ));

            /* Events */
			Route::get('/events',array(
				'as'=>'admin.events.index',
				'uses'=>'Admin\EventController@index'
				));
			Route::get('/events/{id}',array(
				'as'=>'admin.events.edit',
				'uses'=>'Admin\EventController@edit'
				));
			Route::post('/events/{id}/update',array(
				'as'=>'admin.events.update',
				'uses'=>'Admin\EventController@update'
				));
			Route::post('/events/save',array(
				'as'=>'admin.events.save',
				'uses'=>'Admin\EventController@save'
				));
			Route::post('/events/delete',array(
				'as'=>'admin.events.delete',
				'uses'=>'Admin\EventController@delete'
                ));

            /* Testimonials */
			Route::get('/testimonials',array(
				'as'=>'admin.testimonials.index',
				'uses'=>'Admin\TestimonialController@index'
				));
			Route::get('/testimonials/{id}',array(
				'as'=>'admin.testimonials.edit',
				'uses'=>'Admin\TestimonialController@edit'
				));
			Route::post('/testimonials/{id}/update',array(
				'as'=>'admin.testimonials.update',
				'uses'=>'Admin\TestimonialController@update'
				));
			Route::post('/testimonials/save',array(
				'as'=>'admin.testimonials.save',
				'uses'=>'Admin\TestimonialController@save'
				));
			Route::post('/testimonials/delete',array(
				'as'=>'admin.testimonials.delete',
				'uses'=>'Admin\TestimonialController@delete'
                ));

            /* News */
			Route::get('/news',array(
				'as'=>'admin.news.index',
				'uses'=>'Admin\NewsController@index'
				));
			Route::get('/news/{id}',array(
				'as'=>'admin.news.edit',
				'uses'=>'Admin\NewsController@edit'
				));
			Route::post('/news/{id}/update',array(
				'as'=>'admin.news.update',
				'uses'=>'Admin\NewsController@update'
				));
			Route::post('/news/save',array(
				'as'=>'admin.news.save',
				'uses'=>'Admin\NewsController@save'
				));
			Route::post('/news/delete',array(
				'as'=>'admin.news.delete',
				'uses'=>'Admin\NewsController@delete'
                ));

		});
	});
});
