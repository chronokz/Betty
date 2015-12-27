<?php namespace Modules\Pages\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Pages\Database\Models\Page;

class PagesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Page::create([
			'title'		=>	'Welcome page',
			'alias'		=>	'intro',
			'content'	=>	'Welcome to Betty. Enjoy with it.',
			'public'	=>	'1'
		]);
	}

}