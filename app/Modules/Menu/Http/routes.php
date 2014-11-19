<?php

Route::group(['prefix' => 'menu', 'namespace' => 'Modules\Menu\Http\Controllers'], function()
{
	Route::get('/', 'MenuController@index');
});