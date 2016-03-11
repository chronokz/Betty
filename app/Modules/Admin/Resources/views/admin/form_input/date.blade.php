<label class="col-sm-2 control-label">{{ $input['label'] }}</label>
<div class="col-sm-10">
	<?php
		if (!(int)$value)
			$value = date('Y-m-d')
	?>
	{{ Form::text($name, $value, ['class'=>'form-control', 'placeholder'=>$input['label'].' не указано', 'id' => 'date_'.$name]) }}
</div>

@section('scripts')
	@parent
	<script>
		$('#date_{{ $name }}').datepicker({
			dateFormat: 'yy-mm-dd'
		});
	</script>
@endsection