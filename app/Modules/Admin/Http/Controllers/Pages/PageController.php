<?php namespace Modules\Admin\Http\Controllers\Pages;

use Modules\Admin\Http\Controllers\AdminController;	
use Modules\Pages\Database\Models\Page;

class PageController extends AdminController {

	public $module = 'pages';

    public function index()
    {
    	$items = Page::all();
        return admin_view('pages.list', compact('items'));
    }
}