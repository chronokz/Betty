<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'], function()
{
	Route::controller('login', 'Auth\\LoginController');
	// Route::controller('register', 'Auth\\RegisterController');

	Route::group(['before' => 'is_admin'], function ()
	{
		Route::get('/', ['as' => 'admin.home', 'uses' => 'AdminController@home']);
		Route::resource('pages', 'Pages\\PageController');
		Route::controller('logout', 'Auth\\LogoutController');
	});
});