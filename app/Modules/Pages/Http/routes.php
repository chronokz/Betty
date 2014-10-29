<?php

Route::group(['prefix' => 'pages', 'namespace' => 'Modules\Pages\Http\Controllers'], function()
{
	Route::get('/', 'PagesController@index');
});