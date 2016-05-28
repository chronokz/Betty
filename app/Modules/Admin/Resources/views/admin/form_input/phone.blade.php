<label class="col-sm-2 control-label">{{ $input['label'] }}</label>
<div class="col-sm-10">
	{{ Form::text($name, $value, ['class'=>'form-control phone', 'placeholder'=>$input['label'].' не указано']) }}
</div>

@section('scripts')
	@parent
	<script type="text/javascript">
		$('input.phone').mask('+7(999)999-99-99');
	</script>
@endsection