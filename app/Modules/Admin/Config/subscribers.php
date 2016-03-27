<?php

return [

	'title' => 'Подписчики',
	'model' => new Modules\Subscribers\Database\Models\Subscriber,
	'order' => ['id', 'desc'],


	// For Add and Edit
	'form' => [
		
		'name' => [
			'label' => 'Имя',
			'type' => 'text',
            
		],
		'email' => [
			'label' => 'E-mail',
			'type' => 'text',
            
		],
        'submits' => [
            'type' => 'submit'
        ]
        
	],

	// For listing
	'list' => [
		
		'name' => [
			'label' => 'Имя',
			'type' => 'edit_link',
		],
		'email' => [
			'label' => 'E-mail',
			'type' => 'text',
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
