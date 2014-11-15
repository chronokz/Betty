<?php

Route::group(['prefix' => 'feedback', 'namespace' => 'Modules\Feedback\Http\Controllers'], function()
{
	Route::get('/', 'FeedbackController@index');
});