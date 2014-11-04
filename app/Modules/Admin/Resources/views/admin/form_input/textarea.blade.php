<label for="input-text" class="col-sm-2 control-label">{{ $input['label'] }}</label>
<div class="col-sm-10">
	<textarea class="form-control" name="{{ $name }}" rows="10" placeholder="Input text">{{ $item->$name }}</textarea>
</div>