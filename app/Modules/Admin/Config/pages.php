<?php

return [

	'title' => 'Страницы',
	'model' => new Modules\Pages\Database\Models\Page,

	// For Add and Edit
	'form' => [
		'title' => [
			'label' => 'Заголовок',
			'type' => 'text',
			'valid' => 'required',
		],
		'alias' => [
			'label' => 'Алиас',
			'type' => 'text',
		],
		'content' => [
			'label' => 'Контент',
			'type' => 'wysiwyg',
		],
		'public' => [
			'label' => 'Опубликовать',
			'type' => 'yes_no',
		],
		'meta_keywords' => [
			'label' => 'Meta - Ключевые слова',
			'type' => 'textarea',
		],
		'meta_description' => [
			'label' => 'Meta - Описание',
			'type' => 'textarea',
		],
		'submits' => [
			'type' => 'submit'
		]
	],

	// For listing
	'list' => [
		'title' => [
			'label' => 'Заголовок',
		],
		'alias' => [
			'label' => 'Алиас',
		],
		'public' => [
			'label' => 'Опубликовано',
			'type' => 'yes_no',
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