@extends('admin::layouts.master')

@section('content')	
<div class="page-head">
	<a href="{{ URL::route('admin.code.create') }}" class="btn btn-labeled btn-primary pull-right">
		<span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
		{{ trans('admin.create')}}
	</a>
	<h1>Режим разработчика</h1>
</div>


<div class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
			    <div class="box-title">
			        <h3>Созданные модули</h3>
			    </div>
			    <div class="box-body table-responsive no-padding">
			         <table class="table table-hover table-striped">
			         	<thead>
							<tr>
								<th>Имя модуля</th>
							</tr>
			         	</thead>
			         	<tbody>
							@foreach ($modules as $module)
								<tr><td>{{ $module }}</td></tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@stop