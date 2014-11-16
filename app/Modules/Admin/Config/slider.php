<?php

return [

	'title' => 'Слайдер',
	'model' => new Modules\Slider\Database\Models\Slider,

	// For Add and Edit
	'form' => [
		'title' => [
			'label' => 'Заголовок',
			'type' => 'text',
		],
		'description' => [
			'label' => 'Описание',
			'type' => 'textarea',
		],
		'link' => [
			'label' => 'Ссылка',
			'type' => 'text',
		],
		'image' => [
			'label' => 'Изображение',
			'type' => 'image',
			'valid' => 'image',
			'image' => [[
				'method' => 'fit',
				'size' => [1366, 595]
			]]
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
		'title' => [
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