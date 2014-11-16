<?php

return [

	'title' => 'Оборудование',
	'model' => new Modules\Products\Database\Models\Product,

	// For Add and Edit
	'form' => [
		'name' => [
			'label' => 'Наименование',
			'type' => 'text',
			'valid' => 'required'
		],
		// 'alias' => [
		// 	'label' => 'Ссылка',
		// 	'type' => 'text',
		// ],
		'price' => [
			'label' => 'Цена',
			'type' => 'text',
			'valid' => 'integer'
		],
		'image' => [
			'label' => 'Фотография',
			'type' => 'image',
			'valid' => 'image',
			'image' => [[
				'method' => 'fit',
				'size' => [255, 147]
			]]
		],
		'description' => [
			'label' => 'Описание',
			'type' => 'textarea',
		],
		'submits' => [
			'type' => 'submit'
		]
	],

	// For listing
	'list' => [
		'image' => [
			'label' => '',
			'type' => 'image'
		],
		'name' => [
			'label' => 'Заголовок',
		],
		'price' => [
			'label' => 'Заголовок',
		],
		'buttons' => [
			'type' => 'buttons',
			'buttons' => [
				'edit',
				'delete',
			]
		]

	]
];