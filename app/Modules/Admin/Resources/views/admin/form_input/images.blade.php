<label class="col-sm-2 control-label">{{ $input['label'] }}</label>
<div class="col-sm-10">

	<div id="uploader_{{ $name }}">
	    <div class="js-fileapi-wrapper">
	        <input type="file" name="{{ $name }}" />
	    </div>
	    <div data-fileapi="active.show" class="progress">
	        <div data-fileapi="progress" class="progress__bar"></div>
	    </div>
	    <div class="uploaded_files">
	    	@foreach(json_decode($value) as $img)
	    		<div class="item"><a class="pull-right item_remove"><i class="fa fa-remove"></i></a><img src="{{ asset('uploads/'.$module.'/'.$name) }}/admin_{{ $img }}"><input type="hidden" name="files[{{ $name }}][]" value="{{ $img }}"></div>
	    	@endforeach
	    </div>
	</div>

	<p class="help-block">
		Изображение будет {{ trans('image.method.'.$input['image'][0]['method']) }}
		@if (isset($input['image'][0]['size']))
		    под {{ join('x', $input['image'][0]['size']) }}
        @endif
	</p>
	
</div>

@section('scripts')
	@parent
	<script>
	    $('#uploader_{{ $name }}').fileapi({
	        url: '{{ route('admin.uploads', [$name, $module]) }}',
	        autoUpload: true,
	        accept: 'image/*',
	        multiple: true,
	        maxSize: FileAPI.MB*10, // max file size
	        onFileComplete: function(evt, obj)
	        {
	        	$('#uploader_{{ $name }} .uploaded_files')
	        		.append('<div class="item"><a class="pull-right item_remove"><i class="fa fa-remove"></i></a><img src="{{ asset('uploads/'.$module.'/'.$name) }}/admin_'+obj.result+'"><input type="hidden" name="files[{{ $name }}][]" value="'+obj.result+'"></div>');
	        }
	    });

	    $('#uploader_{{ $name }} .uploaded_files').on('click', '.item_remove', function(){
	    	var item = $(this).closest('.item');
	    	var file_name = item.children('input').val();
	    	item.fadeOut('slow');
	    	$.post('{{ route('admin.uploads.remove', [$name, $module]) }}', {'file_name': file_name});
	    });
	</script>
@endsection