<?php

$value = Auth::user();

return [
	'title' => 'Профиль',
	'model' => new Modules\Users\Database\Models\User,
	'value' => $value,

	'form' => [
		'avatar' => [
			'label' => 'Аватар',
			'type' => 'image',
			'image' => [[
				'method' => 'fit',
				'size' => [48,48]
			]]
		],
		'username' => [
			'label' => 'Логин',
			'type' => 'text',
			'valid' => 'required|alpha|min:3',
			'value' => $value->username
		],
		'email' => [
			'label' => 'E-mail',
			'type' => 'text',
			'valid' => 'required|email|unique:users,email,'.$value->id,
			'value' => $value->email
		],
		'name' => [
			'label' => 'Имя',
			'type' => 'text',
			'valid' => 'required',
			'value' => $value->name
		],
		'password' => [
			'label' => 'Пароль',
			'type' => 'password'
		],
		'submits' => [
			'type' => 'submit'
		]
	]
];