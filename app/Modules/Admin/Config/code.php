<?php

return [

	'title' => 'Модули',
	'model' => new Modules\Admin\Database\Models\Module,
	'order' => ['title', 'asc'],


	// For Add and Edit
	'form' => [
		'title' => [
			'label' => 'Имя (прим. Пользователи)',
			'type' => 'text',
			'valid' => 'required',
		],
		'alias' => [
			'label' => 'Алиас (прим. users)',
			'type' => 'text',
            'valid' => 'required',
		],
		'icon' => [
			'label' => 'Иконка',
			'type' => 'icon',
			'options' => \Modules\Admin\Database\Models\Icon::$fa,
		],
//        'timestamps' => [
//            'label' => 'Дата создания и дата редактирования (timestamps)',
//            'type' => 'yes_no',
//        ],
		// 'list' => [
		// 	'label' => 'Поля для списка',
		// 	'type' => 'list_fields',
		// ],
		'form' => [
			'label' => 'Поля',
			'type' => 'form_fields',
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