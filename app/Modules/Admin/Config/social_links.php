<?php

return [

	'title' => 'Социальные ссылки',
	'model' => new Modules\Social\Database\Models\SocialLink,
	'order' => ['position'],
	'sortable' => true,

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
			'type' => 'icon',
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
			'type' => 'faicon'
		],
		'title' => [
			'label' => 'Заголовок',
		],
		'link' => [
			'label' => 'Ссылка',
			'type' => 'link',
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