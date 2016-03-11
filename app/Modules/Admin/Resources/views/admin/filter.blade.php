<div class="content">
	<div class="box">
		<div class="box-title">
			<h3>Фильтры</h3>
		</div>
		<div class="box-body">
			<form action="" class="form-inline" method="get">
				@foreach($config['filter'] as $name => $filter)
					@include('admin::admin.filter.'.$filter['type'])
				@endforeach
				<br>
				<br>
				<button type="submit" class="btn btn-info">Фильтровать</button>
				<a href="{{ Request::url() }}" class="btn btn-danger">Отменить фильтры</a>
			</form>
		</div>
	</div>
</div>