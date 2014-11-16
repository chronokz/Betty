<?php

Route::group(['prefix' => 'products', 'namespace' => 'Modules\Products\Http\Controllers'], function()
{
	Route::get('/', 'ProductsController@index');
});