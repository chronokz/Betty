<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'], function()
{
	Route::controller('login', 'Auth\\LoginController');
	// Route::controller('register', 'Auth\\RegisterController');

	Route::group(['before' => 'is_admin'], function ()
	{
		Route::get('/', ['as' => 'admin.home', 'uses' => 'AdminController@home']);
		Route::get('logout', ['as' => 'admin.logout', 'uses' => 'Auth\\LogoutController@index']);
		Route::get('config', ['as' => 'admin.config.index', 'uses' => 'Config\\ConfigController@index']);
		Route::post('config', ['as' => 'admin.config.save', 'uses' => 'Config\\ConfigController@save']);
        Route::post('menu/sort', ['as' => 'admin.menu.sort', 'uses' => 'MenuController@sort']);
        Route::post('uploads/{input}/{module}', ['as' => 'admin.uploads', 'uses' => 'AdminController@uploads_images']);
        Route::post('uploads/{input}/{module}/remove', ['as' => 'admin.uploads.remove', 'uses' => 'AdminController@uploads_remove']);
        Route::post('sortable/{module}', ['as' => 'admin.sortable', 'uses' => 'AdminController@sortable']);
        Route::get('profile', ['as' => 'admin.profile.index', 'uses' => 'ProfileController@index']);
        Route::post('profile/{id}', ['as' => 'admin.profile.update', 'uses' => 'ProfileController@update']);

        Route::get('bulk/{id}/bulk', ['as' => 'admin.bulk.bulk', 'uses' => 'BulkController@bulk']);
        Route::post('bulk/{id}/send', ['as' => 'admin.bulk.send', 'uses' => 'BulkController@send']);


		Route::resource('pages', 'Pages\\PageController');
		Route::resource('users', 'Users\\UserController');
		Route::resource('feedback', 'Feedback\\FeedbackController');
		Route::resource('social_links', 'SocialLinksController');
		Route::resource('slider', 'SliderController');
		Route::resource('products', 'ProductsController');
		Route::resource('menu', 'MenuController');
		Route::resource('code', 'CodeController');
		Route::resource('about', 'AboutController');
		Route::resource('subscribers', 'SubscribersController');
		Route::resource('bulk', 'BulkController');
	});
});
