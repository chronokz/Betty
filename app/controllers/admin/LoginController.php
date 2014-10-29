<?php
namespace Admin;

class LoginController extends \BaseController {


	public function getLogin()
	{
		exit('Admin');
		return View::make('hello');
	}
	
}