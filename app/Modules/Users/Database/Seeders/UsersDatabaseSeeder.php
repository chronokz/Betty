<?php namespace Modules\Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersDatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		
		$this->call(__NAMESPACE__ ."\\GroupsTableSeeder");
		$this->call(__NAMESPACE__ ."\\UsersTableSeeder");
	}

}