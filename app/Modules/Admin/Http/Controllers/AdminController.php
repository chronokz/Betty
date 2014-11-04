<?php namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
		$data['method'] = 'POST';

		return admin_view('admin.form.form', $data);
	}

	public function edit($id)
	{
		$config = Config::get('admin::'.$this->module);
		$data['form'] = $config['form'];
		$data['item'] = $config['model']->find($id);
		$data['title'] = trans($config['title']);
		$data['sub_title'] = trans('admin.creating');
		$data['form_title'] = trans('admin.form_title');
		$data['save_url'] = URL::route('admin.'.$this->module.'.update', $id);
		$data['cancel_url'] = URL::route('admin.'.$this->module.'.index');
		$data['method'] = 'PUT';

		return admin_view('admin.form.form', $data);
	}

	public function store()
	{
		$config = Config::get('admin::'.$this->module);

		// Validating
		$rules = [];
		$attrs = [];
		foreach ($config['form'] as $field => $option) {
			if (isset($option['valid']))
			{
				$rules[$field] = $option['valid'];
				$attrs[$field] = $option['label'];
			}
		}
		$validator = Validator::make(Input::get(), $rules);
		$validator->setAttributeNames($attrs);

		if ($validator->fails())
		{
			Session::flash('message.error', $validator->messages());
			return Redirect::back();
		}

		// Creating
		$item = $config['model'];
		$item->create(Input::get());

		Session::flash('message.success', trans( 'admin.added', ['id' => $id] ));
		return Redirect::route('admin.'.$this->module.'.index');
	}

	public function update($id)
	{
		$config = Config::get('admin::'.$this->module);

		// Validating
		$rules = [];
		$attrs = [];
		foreach ($config['form'] as $field => $option) {
			if (isset($option['valid']))
			{
				$rules[$field] = $option['valid'];
				$attrs[$field] = $option['label'];
			}
		}
		$validator = Validator::make(Input::get(), $rules);
		$validator->setAttributeNames($attrs);

		if ($validator->fails())
		{
			Session::flash('message.error', $validator->messages());
			return Redirect::back();
		}

		// Updating
		$item = $config['model']->find($id);
		$item->update(Input::get());

		Session::flash('message.success', trans( 'admin.added', ['id' => $id] ));
		return Redirect::route('admin.'.$this->module.'.index');

	}

	public function destroy($id)
	{
		$config = Config::get('admin::'.$this->module);
		$item = $config['model']->find($id);
		$item->delete();

		Session::flash('message.success', trans( 'admin.deleted', ['id' => $id] ));

		return Redirect::back();
	}

}