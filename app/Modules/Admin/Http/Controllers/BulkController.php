<?php namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Http\Controllers\AdminController;
use Modules\Bulk\Database\Models\Bulk;
use Modules\Subscribers\Database\Models\Subscriber;
use Modules\Config\Database\Models\Config as SiteConfig;

use Input;
use Mail;

class BulkController extends AdminController {
	public $module = 'bulk';

	public function bulk($id)
	{
		$data = [
			'from_name' => SiteConfig::whereName('from_name')->first()->value,
			'from_email' => SiteConfig::whereName('from_email')->first()->value,
			'template' => Bulk::find($id),
			'subscribers' => Subscriber::all()
		];

		return admin_view('admin.list.bulk', $data);
	}

	public function send($id)
	{
		$input = Input::get();

		$mail = Bulk::find($id);

		$search = [
			'%user_name%',
			'%user_email%',
		];

		$replace = [
			Input::get('user_name'),
			Input::get('user_email'),
		];

		$data['content'] = str_replace($search, $replace, $mail->message);

		Mail::send('emails.bulk', $data, function($m) use ($input)
		{
			$m->from($input['from_email'], $input['from_name']);
			$m->to($input['user_email'], $input['user_name']);
		});
	}
		
}