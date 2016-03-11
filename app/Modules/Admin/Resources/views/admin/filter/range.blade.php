<div class="form-group">
	<label>{{ $filter['label'] }}</label><br>
	<div class="input-group">
	  <span class="input-group-addon"><input type="text" class="form-control" name="{{ $name }}[]" placeholder="{{ $filter['label'] }} от" value="{{ Input::get($name.'.0') }}"></span>
	  <span class="input-group-addon"><input type="text" class="form-control" name="{{ $name }}[]" placeholder="{{ $filter['label'] }}" value="{{ Input::get($name.'.1') }}"></span>
	</div>
</div>