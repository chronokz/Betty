<?php

return [

	'title' => 'Пользователи',
	'model' => new \Modules\Users\Database\Models\User,

	// For Add and Edit
	'form' => [
		'name' => [
			'label' => 'Имя',
			'type' => 'text',
			'valid' => 'required',
		],
		'username' => [
			'label' => 'Логин',
			'type' => 'text',
		],
		'email' => [
			'label' => 'E-mail',
			'type' => 'text',
			'valid' => 'required',
		],
		'password' => [
			'label' => 'Пароль',
			'type' => 'text',
			'valid' => 'required',
		],
		'group_id' => [
			'label' => 'Группа',
			'type' => 'select',
			'options' => \Modules\Users\Database\Models\Group::lists('name', 'id'),
		],
		'submits' => [
			'type' => 'submit'
		]
	],

	// For listing
	'list' => [
		'email' => [
			'label' => 'E-mail',
		],
		'username' => [
			'label' => 'Логин',
		],
		'group_id' => [
			'label' => 'Грппа',
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