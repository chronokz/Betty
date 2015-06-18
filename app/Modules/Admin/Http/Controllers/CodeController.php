<?php namespace Modules\Admin\Http\Controllers;

use Modules\Admin\Http\Controllers\AdminController;

class CodeController extends AdminController
{

    public $module = 'code';

    public function index()
    {
        $data = [
            'modules' => self::artisan('module:list')
        ];

        return admin_view('admin.code.index', $data);
    }

    public function store()
    {
        // Need validation
        $data = \Input::get();
        $data['alias'] = strtolower($data['alias']);
        $data['model'] = ucfirst(str_singular($data['alias']));
        $data['controller'] = ucfirst($data['alias']);

        // Migration fields
        $migrations = [];
        $fillables = [];
        $form_inline = '';
        $list_inline = '';
        $columns = self::format_data($data['list']);
        $fields = self::format_data($data['form']);


        foreach($columns as $field)
        {
            if ($field['name'])
            {
                $list_inline .= "
		'$field[name]' => [
			'label' => '$field[label]',
			'type' => '$field[input]',
		],";
            }
        }

        foreach($fields as $field)
        {
            if ($field['name'])
            {
                $migrations[] = $field['name'].':'.$field['type'];
                $fillables[] = $field['name'];
                $form_inline .= "
		'$field[name]' => [
			'label' => '$field[label]',
			'type' => '$field[input]',
		],";
            }
        }

        // Create module
        self::artisan('module:make '.$data['alias']);

        // Create migrations
        self::artisan('module:migration create_'.$data['alias'].'_table --fields="'.join(', ', $migrations).'" '.$data['alias']);
        self::artisan('module:migrate '.$data['alias']);

        // Create Model
        self::artisan('module:model '.$data['model'].' '.$data['alias'].' --fillable="'.join(',', $fillables).'"');

        // Admin config
        self::create_config($data, $form_inline, $list_inline);

        // Admin menu
        $admin_menu = file_get_contents('../app/Modules/Admin/Config/admin_menu.php');
        $admin_menu = str_replace(
            '];', "
	[
		'url' => URL::route('admin.$data[alias].index'),
		'icon' => 'steam',
		'text' => '$data[title]'
	]
];", $admin_menu);
        file_put_contents('../app/Modules/Admin/Config/admin_menu.php', $admin_menu);

        // Admin controller
        self::artisan('module:controller '.$data['controller'].'Controller admin');

        // Admin routes
        $admin_routes = file_get_contents('../app/Modules/Admin/Http/routes.php');
        $admin_routes = str_replace(
            '});
});', "     Route::resource('$data[alias]', '$data[controller]Controller');
	});
});", $admin_routes);
        file_put_contents('../app/Modules/Admin/Http/routes.php', $admin_routes);


        \Session::flash('message.success', trans( 'admin.added'));
        return \Redirect::route('admin.'.$this->module.'.index');
    }

	protected function artisan($cmd)
	{
		exec('php '.base_path().'\artisan '.$cmd.' 2>&1', $output);
		return $output;
	}

    protected function format_data($data)
    {
        $fields = [];
        foreach($data as $type => $details)
        {
            foreach($details as $ud => $field)
            {
                $fields[$ud][$type] = $field;
            }
        }
        return $fields;
    }

    protected function create_config($data, $form_inline, $list_inline)
    {
        file_put_contents('../app/Modules/Admin/Config/'.$data['alias'].'.php', "<?php

return [

	'title' => '$data[title]',
	'model' => new Modules\\".ucfirst($data['alias'])."\\Database\\Models\\".$data['model'].",
	'order' => ['id', 'desc'],


	// For Add and Edit
	'form' => [
		$form_inline
	],

	// For listing
	'list' => [
		$list_inline
	]
];
");
    }
}