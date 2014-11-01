<?php

Route::filter('is_admin', function()
{
	if (! Auth::check())
	{
		return Redirect::to('admin/login');
	}
});