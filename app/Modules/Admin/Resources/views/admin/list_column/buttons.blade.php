@foreach ($li['buttons'] as $button)
	
	@if ($button == 'news')
		<a class="btn btn-info btn-sm" href="{{ URL::route('admin.news.index') }}?product_id={{ $item->id }}">
			<i class="fa fa-file-text-o"></i>  Новости
		</a>
	@endif

	@if ($button == 'news')
		<a class="btn btn-info btn-sm" href="">
			<i class="fa fa-gavel"></i>  Ход строительства
		</a>
	@endif

	@if ($button == 'rooms')
		<a class="btn btn-info btn-sm" href="">
			<i class="fa fa-cubes"></i>  Комнаты
		</a>
	@endif

	@if ($button == 'features')
		<a class="btn btn-info btn-sm" href="">
			<i class="fa fa-modx"></i>  Особенности
		</a>
	@endif

	@if ($button == 'documents')
		<a class="btn btn-info btn-sm" href="">
			<i class="fa fa-file-pdf-o"></i>  Документы
		</a>
	@endif

	@if ($button == 'bulk')
		<a class="btn btn-primary btn-sm" href="{{ URL::route('admin.bulk.bulk', $item->id) }}">
			<i class="fa fa-paper-plane"></i> Начать отправку
		</a>
	@endif
	

	@if ($button == 'show')
		<a class="btn btn-info btn-sm" href="{{ URL::route('admin.'.$module.'.show', $item->id) }}?{{ $_SERVER['QUERY_STRING'] }}" title="Посмотреть">
			<i class="fa fa-eye "></i>  
		</a>
	@endif 

	@if ($button == 'edit')
		<a class="btn btn-warning btn-sm" href="{{ URL::route('admin.'.$module.'.edit', $item->id) }}?{{ $_SERVER['QUERY_STRING'] }}" title="Редактировать">
			<i class="fa fa-edit "></i>  
		</a>
	@endif 

	@if ($button == 'delete')
		{{ Form::open(array('url' => URL::route('admin.'.$module.'.destroy', $item->id), 'class' => 'delete-destroy', 'method' => 'DELETE')) }}
			<a class="btn btn-danger btn-sm submit" title="Удалить">
				<i class="fa fa-trash-o "></i> 
			</a>
		{{ Form::close() }}
	@endif 

@endforeach

