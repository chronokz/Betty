<label class="col-sm-2 control-label">{{ $input['label'] }}</label>
<div class="col-sm-10">
	{{ Form::text($name, $value, ['class'=>'form-control', 'placeholder'=>$input['label'].' не указано']) }}
</div>
