<?php

return [

	'title' => 'Меню',
	'model' => new Modules\Menu\Database\Models\Menu,


	// For Add and Edit
	'form' => [
		'text' => [
			'label' => 'Текст',
			'type' => 'text',
			'valid' => 'required',
		],
		'link' => [
			'label' => 'Ссылка',
			'type' => 'text',
		],
		'public' => [
			'label' => 'Опубликовать',
			'type' => 'yes_no',
		],
		'submits' => [
			'type' => 'submit'
		]
	],

	// For listing
	'list' => 'admin.menu'
];