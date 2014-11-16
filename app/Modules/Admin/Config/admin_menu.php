<?php

return [
	[
		'url' => URL::route('admin.users.index'),
		'icon' => 'users',
		'text' => 'Пользователи'
	],
	[
		'url' => URL::route('admin.pages.index'),
		'icon' => 'copy',
		'text' => 'Страницы',
	],
	[
		'url' => URL::route('admin.feedback.index'),
		'icon' => 'envelope',
		'text' => 'Заявки',
	],
	[
		'url' => URL::route('admin.config.index'),
		'icon' => 'wrench',
		'text' => 'Настройки'
	],
	[
		'url' => URL::route('admin.social_links.index'),
		'icon' => 'heart',
		'text' => 'Социальные ссылки'
	]

];