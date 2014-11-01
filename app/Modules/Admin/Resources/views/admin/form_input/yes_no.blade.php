<div class="form-group">
	<label class="col-sm-2 control-label">{{ $input['label'] }}</label>
	<div class="col-sm-10">
		<label class="checkbox"><input type="radio" name="{{ $name }}" value="1" checked="true"> {{ trans('admin.yes') }}</label>
		<label class="checkbox"><input type="radio" name="{{ $name }}" value="0"> {{ trans('admin.no') }}</label>
	</div>
</div>