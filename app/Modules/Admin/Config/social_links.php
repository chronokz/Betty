<?php

return [

	'title' => 'Социальные ссылки',
	'model' => new Modules\Social\Database\Models\SocialLink,

	// For Add and Edit
	'form' => [
		'title' => [
			'label' => 'Заголовок',
			'type' => 'text',
		],
		'link' => [
			'label' => 'Ссылка',
			'type' => 'text',
			'valid' => 'required|url',
		],
		'icon' => [
			'label' => 'Иконка',
			'type' => 'text',
			'valid' => 'required',
		],
		'icon' => [
			'label' => 'Иконка',
			'type' => 'select',
			'options' => \Modules\Social\Database\Models\SocialLink::$icons,
		],
		'submits' => [
			'type' => 'submit'
		]
	],

	// For listing
	'list' => [
		'icon' => [
			'label' => 'Иконка',
		],
		'title' => [
			'label' => 'Заголовок',
		],
		'link' => [
			'label' => 'Алиас',
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