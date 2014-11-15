<?php

return [

	'title' => 'Заявки',
	'model' => new Modules\Feedback\Database\Models\Feedback,

	// For Add and Edit
	// 'form' => [
	// 	'name' => [
	// 		'label' => 'Заголовок',
	// 		'type' => 'text',
	// 		'valid' => 'required',
	// 	],
	// 	'email' => [
	// 		'label' => 'Алиас',
	// 		'type' => 'text',
	// 	],
	// 	'telephone' => [
	// 		'label' => 'Контент',
	// 		'type' => 'wysiwyg',
	// 	],
	// 	'message' => [
	// 		'label' => 'Опубликовать',
	// 		'type' => 'yes_no',
	// 	],
	// 	'meta_keywords' => [
	// 		'label' => 'Meta - Ключевые слова',
	// 		'type' => 'textarea',
	// 	],
	// 	'meta_description' => [
	// 		'label' => 'Meta - Описание',
	// 		'type' => 'textarea',
	// 	],
	// 	'submits' => [
	// 		'type' => 'submit'
	// 	]
	// ],

	'show' => [
		'name' => [
			'label' => 'Имя',
		],
		'email' => [
			'label' => 'E-mail',
		],
		'telephone' => [
			'label' => 'Телефон',
		],
		'message' => [
			'label' => 'Текст сообщения',
		],
	],

	// For listing
	'list' => [
		'name' => [
			'label' => 'Имя',
		],
		'email' => [
			'label' => 'E-mail',
		],
		'telephone' => [
			'label' => 'Телефон',
		],
		'message' => [
			'label' => 'Текст сообщения',
		],
		'buttons' => [
			'type' => 'buttons',
			'buttons' => [
				'show',
				'delete',
			]
		]

	]
];