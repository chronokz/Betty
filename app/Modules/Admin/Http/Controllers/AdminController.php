<?php namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

class AdminController extends Controller {

	public $module = 'home';

	public function home()
	{
		return Redirect::route('admin.pages.index');
	}

	public function index()
	{
		$config = Config::get('admin::'.$this->module);
		$data['module'] = $this->module;
		$data['list'] = $config['list'];
		$data['items'] = $config['model']->all();
		$data['title'] = trans($config['title']);
		$data['sub_title'] = trans('admin.listing');
		$data['list_title'] = trans('admin.list_title');

		return admin_view('admin.list.list', $data);
	}

	public function create()
	{
		$config = Config::get('admin::'.$this->module);
		$data['form'] = $config['form'];
		$data['item'] = $config['model'];
		$data['title'] = trans($config['title']);
		$data['sub_title'] = trans('admin.creating');
		$data['form_title'] = trans('admin.form_title');
		$data['save_url'] = URL::route('admin.'.$this->module.'.store');
		$data['cancel_url'] = URL::route('admin.'.$this->module.'.index');

		return admin_view('admin.form.form', $data);
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