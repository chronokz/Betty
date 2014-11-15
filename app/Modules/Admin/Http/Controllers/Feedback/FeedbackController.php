<?php namespace Modules\Admin\Http\Controllers\Feedback;

use Modules\Admin\Http\Controllers\AdminController;
use Modules\Feedback\Database\Models\Feedback;

class FeedbackController extends AdminController {

	public $module = 'feedback';
	public $create = false;


	public function show($id)
	{
		$item = Feedback::find($id);
		$item->readed = \Auth::user()->id;
		$item->save();

		return parent::show($id);

	}
}