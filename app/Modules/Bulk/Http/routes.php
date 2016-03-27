<?php

Route::group(['prefix' => 'bulk', 'namespace' => 'Modules\Bulk\Http\Controllers'], function()
{
	Route::get('/', 'BulkController@index');
});