<?php namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Users\Database\Models\User;

class UsersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		User::create([
			'name'		=>	'Administrator',
			'username'	=>	'admin',
			'password'	=>	'Betty',
			'email'		=>	'chrono@smtp.ru',
			'group_id'	=>	1
		]);
	}

}
