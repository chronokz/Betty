<?php namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller {

	public function home()
	{
		return Redirect::route('admin.pages.index');
	}

	public function index()
	{
		var_dump('index');
		return admin_view('index');
	}

	public function create()
	{
		var_dump('create');
	}

	public function edit($id)
	{
		var_dump($id);
		var_dump('edit');
	}

	public function store()
	{
		var_dump('store');
	}

	public function update($id)
	{
		var_dump($id);
		var_dump('update');
	}

	public function destroy($id)
	{
		var_dump($id);
		var_dump('destroy');
	}

}