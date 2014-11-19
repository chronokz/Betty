@extends('admin::layouts.master')

@section('content')

<div class="page-head">
	@if ($create)
		<a href="{{ $create_url }}" class="btn btn-labeled btn-primary pull-right">
			<span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
			{{ trans('admin.create')}}
		</a>
	@endif
	<h1>{{ $title }}  <small>{{ $sub_title }}</small></h1>
</div>

<div class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-title">
                    <h3>{{ $list_title }}</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                     <table class="table table-hover table-striped">
					  <thead>
						  <tr>
						  	@foreach ($list as $li)
								<th>
									@if (isset($li['label']))
										{{ $li['label']}}
									@endif
								</th>
							@endforeach
						  </tr>
					  </thead>   
					  <tbody>
					  	@foreach ($items as $item)
						<tr>
							@foreach ($list as $name => $li)
								<td>
									@if (isset($li['type']))
										@include('admin::admin.list_column.'.$li['type'])
									@else
										{{ $item->$name }}
									@endif
								</td>

							@endforeach
						</tr>
					  	@endforeach
					  </tbody>
					  </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</div>
@stop