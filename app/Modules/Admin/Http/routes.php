<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'], function()
{
	Route::controller('login', 'Auth\\LoginController');
	// Route::controller('register', 'Auth\\RegisterController');

	Route::group(['before' => 'is_admin'], function ()
	{
		Route::get('/', ['as' => 'admin.home', 'uses' => 'AdminController@home']);
		Route::resource('pages', 'Pages\\PageController');
		Route::resource('users', 'Users\\UserController');
		Route::controller('logout', 'Auth\\LogoutController');
		Route::get('config', ['as' => 'admin.config.index', 'uses' => 'Config\\ConfigController@index']);
		Route::post('config', ['as' => 'admin.config.save', 'uses' => 'Config\\ConfigController@save']);
	});
});