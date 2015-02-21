<?php

Route::group(['prefix' => 'feedback', 'namespace' => 'Modules\Feedback\Http\Controllers'], function()
{
	Route::post('/', ['as' => 'feedback', 'uses' => 'Modules\Main\Http\Controllers\MainController@feedback']);
});

