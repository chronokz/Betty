@extends('admin::layouts.master')

@section('scripts')
	@if ($sortable)
	<script>
		$(".table-responsive .table tbody").sortable({
			placeholder: "ui-state-highlight",
			update: function(event, ui) {
				$('.save-menu').addClass('active');
				$('.save-status').fadeOut('slow');
			}
		});

		$('.save-menu').unbind('click');
		$('.save-menu').click(function(e){
			e.preventDefault();

			var items = $(".table-responsive .table tbody").sortable('toArray', {attribute: "data-id"});
			var url = '{{ URL::route('admin.sortable', $module) }}';

			$('.save-waiting').show('slow');

			$.post(url, {'items': items}, function(data){
				$('.save-waiting').hide('slow');
				$('.save-status').html(data.status).fadeIn('slow');
				$('.save-menu').removeClass('active');
			});

		});

	</script>
	<style>
	.ui-sortable-helper {
	    display: table;
	}
	</style>
	@endif
@endsection

@section('content')
<div class="page-head">
	@if ($create)
		<a href="{{ $create_url }}?{{ $_SERVER['QUERY_STRING'] }}" class="btn btn-labeled btn-primary pull-right">
			<span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
			{{ trans('admin.create')}}
		</a>
	@endif
	@if (isset($config['back']))
		<a href="{{ $config['back'] }}" class="btn btn-labeled btn-success pull-left"><span class="btn-label"><i class="glyphicon glyphicon-chevron-left"></i></span>Назад</a>
	@endif
	<h1>{{ $title }}  <small>{{ $sub_title }}</small></h1>
</div>

@if (isset($config['filter']))
	@include('admin::admin.filter')
@endif

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
						<tr data-id="{{ $item->id }}">
							@foreach ($list as $name => $li)
								<td>
									@if (isset($li['type']))
										@include('admin::admin.list_column.'.$li['type'])
									@else
                                        @include('admin::admin.list_column.text')
									@endif
								</td>

							@endforeach
						</tr>
					  	@endforeach
					  </tbody>
					  </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->


            <span class="save-waiting"></span>
            <span class="save-status"></span>

            <a class="btn btn-labeled btn-success pull-right save-menu">
            	<span class="btn-label"><i class="fa fa-save"></i></span>
            	{{ trans('admin.save') }}
            </a>

        </div>
    </div>
</div>
@stop