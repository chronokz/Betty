<label class="col-sm-2 control-label">{{ $input['label'] }}</label>
<div class="col-sm-10">
	<?php
		if (!(int)$value)
			$value = date('Y-m-d H:i')
	?>
	{{ Form::text($name, $value, ['class'=>'form-control', 'placeholder'=>$input['label'].' не указано', 'id' => 'date_time_'.$name]) }}
</div>

@section('scripts')
	@parent
	<script>
		$('#date_time_{{ $name }}').datetimepicker({
			dateFormat: 'yy-mm-dd',
			controlType: 'select',
			oneLine: true
		});
	</script>
@endsection