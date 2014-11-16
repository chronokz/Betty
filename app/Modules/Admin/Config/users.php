<?php

return [

	'title' => 'Пользователи',
	'model' => new \Modules\Users\Database\Models\User,

	// For Add and Edit
	'form' => [
		'avatar' => [
			'label' => 'Аватар',
			'type' => 'image',
			'image' => [[
				'method' => 'fit',
				'size' => [48,48]
			]]
		],
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
		// 'password' => [
		// 	'label' => 'Пароль',
		// 	'type' => 'text',
		// 	'valid' => 'password',
		// ],
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
		'avatar' => [
			'label' => 'Аватар',
			'type' => 'image'
		],
		'email' => [
			'label' => 'E-mail',
		],
		'username' => [
			'label' => 'Логин',
		],
		'group_id' => [
			'label' => 'Грппа',
			'type' => 'one_of',
			'options' => \Modules\Users\Database\Models\Group::lists('name', 'id') 
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