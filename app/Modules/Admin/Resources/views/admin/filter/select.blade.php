<div class="form-group">
	<label>{{ $filter['label'] }}</label>
	{{ Form::select($name, ['' => 'Не имеет значения']+$filter['options'], Input::get($name), ['class' => 'form-control']) }}
</div>