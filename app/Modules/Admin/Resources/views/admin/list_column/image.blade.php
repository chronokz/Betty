@if ($item->$name && @fopen($file_url.'/'.$name.'/admin_'.$item->$name, 'r'))
	{{ HTML::image($file_url.'/'.$name.'/admin_'.$item->$name) }}
@else
	{{ HTML::image(admin_asset('img/admin.jpg')) }}
@endif
