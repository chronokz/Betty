<?php

return [

	'title' => 'admin::modules.pages.title',
	'model' => new Modules\Pages\Database\Models\Page,

	'form' => [
		'title' => [
			'label' => 'Заголовок',
			'type' => 'text'
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
];