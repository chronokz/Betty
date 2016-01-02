@if (file_exists($file_url.'/'.$name.'/admin_'.$item->$name))
	{{ HTML::image($file_url.'/'.$name.'/admin_'.$item->$name) }}
@else
	{{ HTML::image(admin_asset('img/admin.jpg')) }}
@endif