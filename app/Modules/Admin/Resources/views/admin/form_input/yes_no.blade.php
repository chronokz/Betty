<?php
$radio[1] = 1;
$radio[0] = 0;

if ($item->$name === 0)
{
	$radio[0] = 1;
	$radio[1] = 0;
}
?>
<div class="form-group">
	<label class="col-sm-2 control-label">{{ $input['label'] }}</label>
	<div class="col-sm-10">
		<label class="checkbox"><input type="radio" name="{{ $name }}" value="1" @if ($radio[1]) checked="true" @endif> {{ trans('admin.yes') }}</label>
		<label class="checkbox"><input type="radio" name="{{ $name }}" value="0" @if ($radio[0]) checked="true" @endif> {{ trans('admin.no') }}</label>
	</div>
</div>