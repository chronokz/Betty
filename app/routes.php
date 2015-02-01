<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	

	$config = [];
	foreach(Modules\Config\Database\Models\Config::all() as $item)
	{
		$config[$item->name] = $item->value;
	}

	return View::make('hello', compact('config'));
});