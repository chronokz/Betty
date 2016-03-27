<?php

Route::group(['prefix' => 'subscribers', 'namespace' => 'Modules\Subscribers\Http\Controllers'], function()
{
	Route::get('/', 'SubscribersController@index');
});