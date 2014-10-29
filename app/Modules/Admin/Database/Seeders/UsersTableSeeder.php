<?php namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Admin\Database\Models\User;

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
			'password'	=>	'secret',
			'email'		=>	'pingpong.labs@gmail.com'
		]);
	}

}