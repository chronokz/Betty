<label class="col-sm-2 control-label">{{ $input['label'] }}</label>
<div class="col-sm-10">
	<div class="input-group">
	  <span class="input-group-addon"><i id="icon_selector_view" style="font-size:18px" class="fa fa-{{ ($value)?$value:$input['options'][0] }}"></i></span>
	  <select name="{{ $name }}" class="form-control" id="icon_selector">
	  	@foreach ($input['options'] as $icon)
	  		<option value="{{ $icon }}" @if($value == $icon) selected @endif>{{ $icon }}</option>
	  	@endforeach
	  </select>
	</div>
</div>
@section('scripts')
	@parent
	<script>
		$('#icon_selector').change(function(){
			$('#icon_selector_view').attr('class', 'fa fa-'+$(this).val());
		});
	</script>
@endsection