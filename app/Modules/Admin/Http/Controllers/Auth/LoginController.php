<?php namespace Modules\Admin\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller {

    public function getIndex()
    {
        return admin_view('auth.login');
    }

    public function postIndex()
    {
    	if(Auth::attempt($data = Input::only('username', 'password'), Input::has('remember')))
    	{
    		return admin_redirect('home')->withSuccess('Login Success.');
    	}

    	return admin_redirect()->back()->withInput()->withError('Login Failed.');
    }

}