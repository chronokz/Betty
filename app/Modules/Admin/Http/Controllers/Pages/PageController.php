<?php namespace Modules\Admin\Http\Controllers\Pages;

use Illuminate\Routing\Controller;

class PageController extends Controller {

    public function getIndex()
    {
        return admin_view('pages.index');
    }

}