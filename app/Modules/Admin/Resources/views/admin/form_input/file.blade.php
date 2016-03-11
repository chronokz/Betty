<label class="col-sm-2 control-label">{{ $input['label'] }}</label>
<div class="col-sm-10">
	@if ($value)
		{{ HTML::link($file_url.'/'.$name.'/'.$value, '', $value, ['class' => 'uploaded_image']) }}
	@endif

	{{ Form::file($name, ['class' => 'form-control']) }}
</div>
