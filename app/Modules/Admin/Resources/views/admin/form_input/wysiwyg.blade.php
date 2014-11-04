<label for="input-text" class="col-sm-2 control-label">{{ $input['label'] }}</label>
<div class="col-sm-10">
	<textarea class="form-control wysiwyg" name="{{ $name }}" rows="10" placeholder="Input text" id="{{ $name }}">{{ $item->$name }}</textarea>
</div>