<?php

Route::filter('is_admin', function()
{
	if (!Auth::check() || Auth::user()->group_id != 1 && Auth::user()->group_id != 2)
	{
		return Redirect::to('admin/login');
	}
});