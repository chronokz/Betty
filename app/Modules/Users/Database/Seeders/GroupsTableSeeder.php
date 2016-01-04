<?php namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Users\Database\Models\Group;

class GroupsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Group::create([
			'name'		=>	'Администратор',
			'alias'		=>	'admin',
		],[
			'name'		=>	'Разработчик',
			'alias'		=>	'developer',
		]);
	}

}