<?php

return [

	'title' => 'Рассылка',
	'model' => new Modules\Bulk\Database\Models\Bulk,
	'order' => ['id', 'desc'],


	// For Add and Edit
	'form' => [
		
		'name' => [
			'label' => 'Название',
			'type' => 'text',
            
		],
		'subject' => [
			'label' => 'Тема письма',
			'type' => 'text',
            
		],
		'message' => [
			'label' => 'Текст письма',
			'type' => 'wysiwyg',
            
		],
        'submits' => [
            'type' => 'submit'
        ]
        
	],

	// For listing
	'list' => [
		
		'name' => [
			'label' => 'Название',
			'type' => 'edit_link',
		],
        'buttons' => [
            'type' => 'buttons',
            'buttons' => [
                'bulk',
                'edit',
                'delete',
            ]
        ]
        
	]
];
