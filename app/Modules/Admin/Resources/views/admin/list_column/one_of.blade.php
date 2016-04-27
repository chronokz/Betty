@if (isset($li['options'][$item->$name]))
	{{ $li['options'][$item->$name] }}
@else
	<span class="text-muted">- Не указано -</span>
@endif
