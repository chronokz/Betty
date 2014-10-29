<?php namespace Modules\Admin\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Modules\Admin\Database\Models\User;
use Pingpong\Modules\Validator\ControllerValidator;

class RegisterController extends ControllerValidator {

	protected $rules = [
		'name'		=>	'required',
		'username'	=>	'required|unique:users,username',
		'email'		=>	'required|unique:users,email',
		'password'	=>	'required|min:6|max:20',
	];

    public function getIndex()
    {
        return admin_view('auth.register');
    }

    public function postIndex()
    {
    	$this->validate($data = Input::all());

    	$user = User::create($data);

    	Auth::login($user, true);

    	return admin_redirect('home');
    }

}