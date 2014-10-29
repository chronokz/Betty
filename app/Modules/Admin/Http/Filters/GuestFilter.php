<?php namespace Modules\Admin\Http\Filters; 

use Illuminate\Support\Facades\Auth;

class GuestFilter {

	public function filter()
	{
		if(Auth::check())
		{
			return admin_redirect('home');
		}
	}

} 