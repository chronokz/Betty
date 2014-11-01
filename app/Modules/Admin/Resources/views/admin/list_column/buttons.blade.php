@foreach ($li['buttons'] as $button)

	@if ($button == 'show')
		<a class="btn btn-success btn-sm" href="{{ URL::route('admin.'.$module.'.show', $item->id) }}">
			<i class="fa fa-eye "></i>  
		</a>
	@endif 

	@if ($button == 'edit')
		<a class="btn btn-info btn-sm" href="{{ URL::route('admin.'.$module.'.edit', $item->id) }}">
			<i class="fa fa-edit "></i>  
		</a>
	@endif 

	@if ($button == 'delete')
		<a class="btn btn-danger btn-sm" href="{{ URL::route('admin.'.$module.'.destroy', $item->id) }}">
			<i class="fa fa-trash-o "></i> 
		</a>
	@endif 

@endforeach

