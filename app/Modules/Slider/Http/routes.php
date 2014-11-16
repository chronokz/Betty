<?php

Route::group(['prefix' => 'slider', 'namespace' => 'Modules\Slider\Http\Controllers'], function()
{
	Route::get('/', 'SliderController@index');
});