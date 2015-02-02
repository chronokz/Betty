<?php namespace Modules\Main\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Slider\Database\Models\Slider;
use Modules\Menu\Database\Models\Menu;
use Modules\Pages\Database\Models\Page;
use Modules\Social\Database\Models\SocialLink;
use Modules\Config\Database\Models\Config;
use Modules\Products\Database\Models\Product;
use Modules\Feedback\Database\Models\Feedback;

class MainController extends Controller {

	public function index()
	{

		$config = [];
		foreach(Config::all() as $item)
		{
			$config[$item->name] = $item->value;
		}

		$data = [
			'config' => $config,
			'slider' => Slider::all(),
			'menu' => Menu::wherePublic(1)->orderBy('position')->get(),
			'intro' => Page::whereAlias('intro')->first(),
			// 'what' => Page::whereAlias('what')->first(),
			// 'offices' => Page::whereAlias('offices')->first(),
			// 'feedback' => Page::whereAlias('feedback')->first(),
			// 'contacts' => Page::whereAlias('contacts')->first(),
			// 'products' => Product::orderBy('price')->get(),
			// 'social_links' => SocialLink::all()
		];

		return \View::make('main::index', $data);
	}

	public function page($alias)
	{
		$config = [];
		foreach(Config::all() as $item)
		{
			$config[$item->name] = $item->value;
		}

		$data = [
			'config' => $config,
			'menu' => Menu::wherePublic(1)->orderBy('position')->get(),
			'page' => Page::whereAlias($alias)->first(),
			// 'what' => Page::whereAlias('what')->first(),
			// 'offices' => Page::whereAlias('offices')->first(),
			// 'feedback' => Page::whereAlias('feedback')->first(),
			// 'contacts' => Page::whereAlias('contacts')->first(),
			// 'products' => Product::orderBy('price')->get(),
			// 'social_links' => SocialLink::all()
		];

		if (!$data['page'])
			return \App::abort(404);

		return \View::make('main::page', $data);
	}


	public function feedback()
	{
		$data = \Input::get();

		$validator = \Validator::make(
			$data,
		    [
		        'name' => 'required',
		        'email' => 'required|email',
		        'telephone' => 'required|regex:/\+7\(\d{3}\)\d{3}-\d{2}-\d{2}/',
		    ]
		);

		if ($validator->fails())
		{
			return \Response::json(
				[
					'status' => 'error',
					'errors' => $validator->messages()
				]
			);
		}
		else
		{
			Feedback::create($data);
			return \Response::json(
				[
					'status' => 'success',
					'message' => 'Ваша заявка была отправлена'
				]
			);
		}

	}
}