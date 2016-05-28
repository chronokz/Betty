<label class="col-sm-2 control-label">{{ $input['label'] }}</label>
<div class="col-sm-10">

	<div id="{{ $name }}_items" class="group_items">
		<a class="btn btn-info btn-labeled new_item"><span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Добавить</a>
		@foreach((array)json_decode($value) as $tel)
			<div class="item input-group">
				<input type="text" name="{{ $name }}[]" class="form-control phone" value="{{ $tel }}">
				<a class="input-group-addon btn item_remove">x</a>
			</div>
		@endforeach
	</div>
</div>

@section('scripts')
	@parent
	<script type="text/javascript">
		$('input.phone').mask('+7(999)999-99-99');

		$('#{{ $name }}_items .new_item').click(function(){
			var input = '<div class="item input-group"><input type="text" name="{{ $name }}[]" class="form-control phone"><a class="input-group-addon btn item_remove">x</a></div>';
			$(this).parent().append(input);
			$(this).parent().children('.item:last').children('input.phone').mask('+7(999)999-99-99');
		});

		$('#{{ $name }}_items').on('click', '.item_remove', function(){
			var item = $(this).closest('.item'),
				value = item.find('.phone').val();

			if (!value)
				item.remove();
			else if (confirm('Вы действительно хотите удалить номер '+value+'?'))
				item.remove();
		});
	</script>
@endsection