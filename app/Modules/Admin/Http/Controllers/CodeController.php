<?php namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Http\Controllers\AdminController;

class CodeController extends AdminController {
	
	public function index()
	{
		$data = [
			'modules' => self::run('module:list')
		];

		return admin_view('admin.code.index', $data);
	}

	protected function run($cmd)
	{
		exec('php '.base_path().'\artisan '.$cmd.' 2>&1', $output);
		return $output;
	}
}