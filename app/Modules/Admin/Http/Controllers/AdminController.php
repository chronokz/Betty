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
	public $create = true;
	public $upload = '/uploads/';

	public function upload_path($path = '')
	{
		return public_path().$this->upload.$path;
	}

	public function upload_link($path = '')
	{
		return asset($this->upload.$path);
	}

	public function home()
	{
		return Redirect::route('admin.users.index');
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
		$data['create_url'] = URL::route('admin.'.$this->module.'.create');
		$data['create'] = $this->create;

		return admin_view('admin.list.list', $data);
	}

	public function show($id)
	{
		$config = Config::get('admin::'.$this->module);
		$data['form'] = $config['show'];
		$data['item'] = $config['model']->find($id);
		$data['title'] = trans($config['title']);
		$data['sub_title'] = trans('admin.showing');
		$data['form_title'] = trans('admin.show_title');
		$data['cancel_url'] = URL::route('admin.'.$this->module.'.index');

		return admin_view('admin.show.show', $data);	
	}

	public function create()
	{
		$config = Config::get('admin::'.$this->module);
		$data['form'] = $config['form'];
		$data['item'] = $config['model'];
		$data['title'] = trans($config['title']);
		$data['sub_title'] = trans('admin.creating');
		$data['form_title'] = trans('admin.form_title');
		$data['file_url'] = self::upload_link($this->module);
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
		$data['file_url'] = self::upload_link($this->module);
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

		Session::flash('message.success', trans( 'admin.added' ));
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

		$data = Input::get();
		$item = $config['model']->find($id);

		if (Input::file())
		{
			foreach (Input::file() as $input => $file)
			{
				if (Input::file($input)->isValid())
				{

					$folder = self::upload_path()
						.$this->module.'/'
						.$input.'/';

					\File::makeDirectory($folder, 0777, true, true);

					// Removing old files
					if ($item->$input)
					{
						array_map('unlink', glob($folder.$item->$input.'*'));
					}

					// Naming new file
					$file_name = time().'.'.Input::file($input)->getClientOriginalExtension();
					$save_to = $folder.$file_name;

					if ($config['form'][$input]['type'] == 'file')
					{
						Input::file($input)->move($save_to);
					}

					if ($config['form'][$input]['type'] == 'image')
					{
						foreach ($config['form'][$input]['image'] as $image_config)
						{
							$method = $image_config['method'];
							list($width, $height) = $image_config['size'];

							if (isset($image_config['prefix']))
							{
								// Naming new file with prefix
								$file_name = $image_config['prefix'].'_'.time().'.'
									.Input::file($input)->getClientOriginalExtension();
								$save_to = $folder.$file_name;
							}

							\Image::make(Input::file($input))
								->$method($width, $height)
								->save($save_to);
						}
					}

					$data[$input] = $file_name;
				}
			}
		}

		// Updating
		$item->update($data);

		Session::flash('message.success', trans( 'admin.edited', ['id' => $id] ));
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