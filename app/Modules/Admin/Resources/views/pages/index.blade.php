@extends('admin::layouts.master')

@section('content')
<div class="page-head">
	<button class="btn btn-labeled btn-primary pull-right">
	<span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Create</button>
	<h1>Basic Tables  <small>small text goes here</small></h1>
</div>
<div class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-title">
                    <h3>Responsive Table</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                     <table class="table table-hover table-striped">
					  <thead>
						  <tr>
							  <th>Title</th>
							  <th>Alias</th>
							  <th>Public</th>
							  <th>Actions</th>
						  </tr>
					  </thead>   
					  <tbody>
					  	@foreach ($items as $item)
						<tr>
							<td>{{ $item->title }}</td>
							<td>{{ $item->alias }}</td>
							<td>{{ $item->public ? '<span class="label label-success">Да</span>' : '<span class="label label-warning">Нет</span>' }} </td>
							<td>
								<a class="btn btn-success btn-sm" href="table.html#">
									<i class="fa fa-eye "></i>  
								</a>
								<a class="btn btn-info btn-sm" href="table.html#">
									<i class="fa fa-edit "></i>  
								</a>
								<a class="btn btn-danger btn-sm" href="table.html#">
									<i class="fa fa-trash-o "></i> 
								</a>
							</td>

						</tr>
					  	@endforeach
					  </tbody>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</div>
@stop