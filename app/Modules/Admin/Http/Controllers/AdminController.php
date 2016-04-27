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
		$data['config'] = $config;

		$items = $config['model'];
		$items = $this->filtered_items($items);
		$items = $this->where_items($items);
		$items = $this->ordered_items($items);
		if (isset($config['pager']))
		{
			$data['items'] = $items->paginate($config['pager']);
		}
		else
		{
			$data['items'] = $items->get();
		}

		$data['title'] = trans($config['title']);
		$data['sortable'] = (isset($config['sortable']) && $config['sortable'])?1:0;
		$data['sub_title'] = trans('admin.listing');
		$data['list_title'] = trans('admin.list_title');
		$data['file_url'] = self::upload_link($this->module);
		$data['create_url'] = URL::route('admin.'.$this->module.'.create');
		$data['create'] = $this->create;

		$render_view = 'admin.list.list';
		if (is_string($config['list']))
		{
			$render_view = $config['list'];
		}

		return admin_view($render_view, $data);
	}

	public function show($id)
	{
		$config = Config::get('admin::'.$this->module);
		$data['form'] = $config['show'];
		$data['item'] = $config['model']->find($id);
		$data['title'] = trans($config['title']);
		$data['sub_title'] = trans('admin.showing');
		$data['form_title'] = trans('admin.show_title');
		$data['file_url'] = self::upload_link($this->module);
		$data['cancel_url'] = URL::route('admin.'.$this->module.'.index');

		return admin_view('admin.show.show', $data);	
	}

	public function create()
	{

		$config = Config::get('admin::'.$this->module);
		$data['form'] = self::load_form();
		$data['item'] = $config['model'];
		$data['title'] = trans($config['title']);
		$data['sub_title'] = trans('admin.creating');
		$data['form_title'] = trans('admin.form_title');
		$data['file_url'] = self::upload_link($this->module);
		$data['save_url'] = URL::route('admin.'.$this->module.'.store');
		$data['cancel_url'] = URL::route('admin.'.$this->module.'.index');
		$data['method'] = 'POST';
		$data['module'] = $this->module;

		return admin_view('admin.form.form', $data);
	}

	public function edit($id)
	{
		$config = Config::get('admin::'.$this->module);
		$data['form'] = self::load_form();
		$data['item'] = $config['model']->find($id);
		$data['title'] = trans($config['title']);
		$data['sub_title'] = trans('admin.editing');
		$data['form_title'] = trans('admin.form_title');
		$data['file_url'] = self::upload_link($this->module);
		$data['save_url'] = URL::route('admin.'.$this->module.'.update', $id);
		$data['cancel_url'] = URL::route('admin.'.$this->module.'.index');
		$data['method'] = 'PUT';
		$data['module'] = $this->module;

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
			Input::flash();
			Session::flash('message.error', $validator->messages());
			return Redirect::back();
		}

		// Creating
		$item = $config['model'];
		$data = Input::get();
		$data = self::save_youtube($data);
		$data = self::save_array($data);
		$data = self::save_files($item, $data);
		$item = $item->create($data);

		$this->after_store($item);

		Session::flash('message.success', trans( 'admin.added', ['id' => $item->id] ));
		parse_str($_SERVER['QUERY_STRING'], $params);
		return Redirect::to(route('admin.'.$this->module.'.index', $params));
	}

	public function after_store($item)
	{
		// Any after creates
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
			Input::flash();
			Session::flash('message.error', $validator->messages());
			return Redirect::back();
		}

		// Updating
		$item = $config['model']->find($id);
		$data = Input::get();
		$data = self::save_youtube($data);
		$data = self::save_array($data);
		$data = self::save_password($data);
		$data = self::save_files($item, $data);
		$item = $item->update($data);

		$this->after_update($item);

		Session::flash('message.success', trans( 'admin.edited', ['id' => $id] ));
		parse_str($_SERVER['QUERY_STRING'], $params);
		return Redirect::to(route('admin.'.$this->module.'.index', $params));

	}

	public function after_update($item)
	{
		// Any after updates
	}

	public function destroy($id)
	{
		$config = Config::get('admin::'.$this->module);
		$item = $config['model']->find($id);
		$item->delete();

		Session::flash('message.success', trans( 'admin.deleted', ['id' => $id] ));

		return Redirect::back();
	}

	public function sortable($module)
	{
		$config = Config::get('admin::'.$module);
		foreach(Input::get('items') as $position => $item_id)
		{
			$item = $config['model']->find($item_id);
			$item->position = $position;
			$item->save();
		}

		return \Response::json(['status' => trans('admin.saved')]);
	}


	public function uploads_remove($input, $module)
	{
		$folder = self::upload_path()
			.$module.'/'
			.$input.'/';

		array_map('unlink', glob($folder.Input::get('file_name').'*'));
		array_map('unlink', glob($folder.'*'.Input::get('file_name').'*'));
	}

	public function uploads_images($input, $module)
	{
		$config = Config::get('admin::'.$module);
		$admin_image = [
			'method' => 'fit',
			'size' => [34, 34],
			'prefix' => 'admin'
		];

		$folder = self::upload_path()
			.$module.'/'
			.$input.'/';

		\File::makeDirectory($folder, 0777, true, true);

		$file = Input::file($input);
		if ($file->isValid())
		{
			array_unshift($config['form'][$input]['image'], $admin_image);

			$file_name = $this->rand_name();
			$file_ext = strtolower($file->getClientOriginalExtension());
			
			$origin_name = $file_name;

			foreach ($config['form'][$input]['image'] as $image_config)
			{

				$method = $image_config['method'];

				if (isset($image_config['size']))
				{
					list($width, $height) = $image_config['size'];
				}

				if (isset($image_config['prefix']))
				{
					// Naming new file with prefix
					$file_name = $image_config['prefix'].'_'.$origin_name;
				}
				else
				{
					// Naming new file without prefix
					$file_name = $origin_name;
				}

				$file_save = $file_name.'.'.$file_ext;
				$save_to = $folder.$file_save;
				
				if ($method == 'original')
				{
					\Image::make($file)->save($save_to);
				}
				elseif($method == 'widen')
				{
					\Image::make($file)
						->$method($width)
						->save($save_to);
				}
				elseif($method == 'heighten')
				{
					\Image::make($file)
						->$method($height)
						->save($save_to);
				}
				elseif($method == 'resize')
				{
					\Image::make($file)
						->$method($width, $height, function($constraint){
							$constraint->aspectRatio();
						})
						->save($save_to);
				}
				else
				{
					\Image::make($file)
						->$method($width, $height)
						->save($save_to);
				}
			}
		}


		return $origin_name.'.'.$file_ext;
	}

	protected function rand_name()
	{
		return substr(md5(rand()),0,10);
	}

	protected function filtered_items($query)
	{
		$config = Config::get('admin::'.$this->module);

		if (isset($config['filter']))
		{
			foreach ($config['filter'] as $name => $options) {

				switch ($options['type']) {
					case 'text':
						if (Input::get($name))
							$query = $query->where($name, 'LIKE', '%'.Input::get($name).'%');
					break;
					case 'select':
						if (Input::get($name) !== null && Input::get($name) !== '')
							$query = $query->where($name, Input::get($name));
					break;
					case 'range':
						if (Input::get($name.'.0') && Input::get($name.'.1'))
						 	$query = $query->whereBetween($name, Input::get($name));
					break;
					default:
						# code...
					break;
				}

			}
		}
		return $query;
	}

	protected function where_items($query)
	{
		$config = Config::get('admin::'.$this->module);

		if (isset($config['where']))
		{
			foreach ((array)$config['where'] as $cond) {
				list($name, $exp, $value) = $cond;

				switch ($exp) {
					case 'in':
						$query = $query->whereIn($name, $value);
						break;					
					default:
						$query = $query->where($name, $exp, $value);
				}
				
			}
		}

		return $query;
	}

	protected function ordered_items($query)
	{
		$config = Config::get('admin::'.$this->module);
		if (isset($config['order']))
		{
			$order = (isset($config['order'][1])) ? $config['order'][1] : 'asc';
			$query = $query->orderBy($config['order'][0], $order);
		}
		return $query;
	}

	protected function load_form()
	{
		$form = Config::get('admin::'.$this->module.'.form');
		if (Input::old())
		{
			foreach ($form as $name => $field)
			{
				$form[$name]['value'] = Input::old($name);
			}
		}
		return $form;
	}

	protected function save_youtube($data)
	{
		$config = Config::get('admin::'.$this->module);
		foreach ($config['form'] as $name => $field)
		{
			if ($field['type'] == 'youtube')
			{
				if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', Input::get($name), $match)) {
				    $data[$name] = $match[1];
				}
				else
				{
					$data[$name] = '';
				}
			}
		}
		return $data;
	}

	protected function save_password($data)
	{
		$config = Config::get('admin::'.$this->module);
		foreach ($config['form'] as $name => $field)
		{
			if ($field['type'] == 'password' && !trim($data[$name]))
			{
				unset($data[$name]);
			}
		}
		return $data;
	}

	protected function save_array($data)
	{
		if (isset($data['files']))
		{
			foreach($data['files'] as $name => $files)
			{
				$data[$name] = json_encode($files);
			}
			unset($data['files']);
		}

		return $data;
	}

	protected function save_files($model, $data)
	{
		$config = Config::get('admin::'.$this->module);
		
		if (Input::file())
		{
			foreach (Input::file() as $input => $file)
			{
				if (Input::file($input) && Input::file($input)->isValid())
				{

					$folder = self::upload_path()
						.$this->module.'/'
						.$input.'/';

					\File::makeDirectory($folder, 0777, true, true);

					// Removing old files
					if ($model->id && $model->$input)
					{
						array_map('unlink', glob($folder.$model->$input.'*'));
						array_map('unlink', glob($folder.'*'.$model->$input.'*'));
					}

					// Naming new file
					$file_name = time();
					$file_ext = Input::file($input)->getClientOriginalExtension();
					$file = $file_name.'.'.$file_ext;
					$save_to = $folder.$file;

					if ($config['form'][$input]['type'] == 'file')
					{
						Input::file($input)->move($save_to);
					}

					if ($config['form'][$input]['type'] == 'image')
					{
						// Create small icon for admin listing
						$admin_image = [
							'method' => 'fit',
							'size' => [34, 34],
							'prefix' => 'admin'
						];
						array_unshift($config['form'][$input]['image'], $admin_image);

						$origin_name = $file_name;

						foreach ($config['form'][$input]['image'] as $image_config)
						{
							$method = $image_config['method'];
							
							if (isset($image_config['size']))
							{
								list($width, $height) = $image_config['size'];
							}

							if (isset($image_config['prefix']))
							{
								// Naming new file with prefix
								$file_name = $image_config['prefix'].'_'.$origin_name;
							}
							else
							{
								// Naming new file without prefix
								$file_name = $origin_name;
							}

							$file_save = $file_name.'.'.$file_ext;
							$save_to = $folder.$file_save;
							
							if ($method == 'original')
							{
								\Image::make(Input::file($input))->save($save_to);
							}
							elseif($method == 'widen')
							{
								\Image::make(Input::file($input))
									->$method($width)
									->save($save_to);
							}
							elseif($method == 'heighten')
							{
								\Image::make(Input::file($input))
									->$method($height)
									->save($save_to);
							}
							else
							{
								\Image::make(Input::file($input))
									->$method($width, $height)
									->save($save_to);
							}
						}
					}

					$data[$input] = $file;
				}
			}
		}
		return $data;
	}

}
