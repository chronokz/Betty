<label class="col-sm-2 control-label">{{ $input['label'] }}</label>
<div class="col-sm-10">
	{{ Form::text($name, 'https://www.youtube.com/watch?v='.$value, ['class'=>'form-control', 'placeholder'=>$input['label'].' не указано']) }}
	@if($value)
		<iframe width="100%" height="400" src="https://www.youtube.com/embed/{{ $value }}?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
	@endif
</div>