<?php namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Http\Controllers\AdminController;
use Modules\Menu\Database\Models\Menu;

class MenuController extends AdminController {

	public $module = 'menu';

	public function sort()
	{
		$items = \Input::get();
		unset($items['null']);

		foreach ($items as $item)
		{
			$item = json_decode($item);

			$menu = Menu::find($item->item_id);
			$menu->parent_id = $item->parent_id;
			$menu->position = $item->position;
			$menu->depth = $item->depth;
			$menu->right = $item->right;
			$menu->left = $item->left;
			$menu->save();
		}

		return \Response::json(['status' => trans('admin.saved')]);
	}
}