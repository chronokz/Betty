<label class="col-sm-2 control-label">{{ $input['label'] }}</label>
<div class="col-sm-10">
	@if ($value)
		{{ HTML::image($file_url.'/'.$name.'/'.$value, '', ['class' => 'uploaded_image']) }}
	@endif

	{{ Form::file($name, ['class' => 'form-control']) }}
	<p class="help-block">
		Изображение будет {{ $input['image'][0]['method'] }}
		под {{ join('x', $input['image'][0]['size']) }}
	</p>

</div>