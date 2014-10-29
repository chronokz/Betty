<?php namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller;

class HomeController extends Controller {

    public function index()
    {
        return admin_view('index');
    }

}