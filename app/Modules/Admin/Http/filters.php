<?php

Route::filter('is_admin', function()
{
	if (!Auth::check() && (Auth::user()->group == 1 || Auth::user()->group == 2))
	{
		return Redirect::to('admin/login');
	}
});