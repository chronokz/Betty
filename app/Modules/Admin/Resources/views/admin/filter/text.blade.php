<div class="form-group">
	<label>{{ $filter['label'] }}</label>
	<input type="text" class="form-control" name="{{ $name }}" placeholder="{{ $filter['label'] }}" value="{{ Input::get($name) }}">
</div>