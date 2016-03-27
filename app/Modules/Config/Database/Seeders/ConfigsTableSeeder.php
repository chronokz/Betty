<?php namespace Modules\Config\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Config\Database\Models\Config;

class ConfigsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{		
		Config::create([
			'label'		=> 	'Заголовок',
			'name'		=>	'title',
			'value'		=>	'Once more Betty'
		]);

		Config::create([
			'label'		=> 	'Логотип',
			'name'		=>	'logo',
			'value'		=>	'Betty'
		]);

		Config::create([
			'label'		=> 	'Meta-ключевые слова',
			'name'		=>	'keyword'
		]);

		Config::create([
			'label'		=> 	'Meta-описание',
			'name'		=>	'description'
		]);

		Config::create([
			'label'		=> 	'Телефон',
			'name'		=>	'phone'
		]);

		Config::create([
			'label'		=> 	'Адрес',
			'name'		=>	'address',
			'type'		=> 'textarea'
		]);

		Config::create([
			'label'		=> 'Имя для рассылки',
			'name'		=> 'from_name',
			'type'		=> 'text'
		]);

		Config::create([
			'label'		=> 'E-mail для рассылки',
			'name'		=> 'from_email',
			'type'		=> 'text'
		]);
	}

}