<div class="col-sm-2"></div>
<div class="col-sm-10">
	<button type="submit" class="btn btn-primary">{{ trans('admin.save') }}</button>
	<a href="{{ $cancel_url }}?{{ $_SERVER['QUERY_STRING'] }}" class="btn btn-warning">{{ trans('admin.cancel') }}</a>
</div>