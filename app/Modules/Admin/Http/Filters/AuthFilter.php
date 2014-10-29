<?php namespace Modules\Admin\Http\Filters; 

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthFilter {

	public function filter()
	{
		if( ! Auth::check())
		{
			return Redirect::to('admin/login');
		}
	}

} 