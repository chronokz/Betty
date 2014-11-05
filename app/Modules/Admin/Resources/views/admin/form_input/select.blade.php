<label class="col-sm-2 control-label">{{ $input['label'] }}</label>
<div class="col-sm-10">
	<select name="{{ $name }}" class="form-control">
		@foreach ($input['options'] as $select_id => $select_value)
			<option value="{{ $select_id }}">{{ $select_value }}</option>
		@endforeach
	</select>
</div>