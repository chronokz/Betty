<?php namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Http\Controllers\AdminController;

use URL;

class ProfileController extends AdminController {

	public $module = 'profile';

	public function index()
	{
		$config = \Config::get('admin::'.$this->module);
		
		$data['title'] = trans($config['title']);
		$data['sub_title'] = trans('admin.editing');
		$data['form_title'] = trans('admin.form_title');
		$data['save_url'] = URL::route('admin.'.$this->module.'.update', $config['value']->id);
		$data['cancel_url'] = URL::route('admin.'.$this->module.'.index');
		$data['method'] = 'POST';

		$data['form'] = $config['form'];
		
		$data['form']['submits']['type'] = 'submit';

		return admin_view('admin.form.form', $data);
	}

	// public function save()
	// {
	// 	foreach (Config::all() as $item)
	// 	{
	// 		$item->value = \Input::get($item->name);
	// 		$item->save();
	// 	}

	// 	\Session::flash('message.success', trans( 'admin.updated' ));
	// 	return \Redirect::route('admin.'.$this->module.'.index');
	// }
}