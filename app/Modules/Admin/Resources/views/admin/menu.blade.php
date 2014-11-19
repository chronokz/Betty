@extends('admin::layouts.master')

@section('content')

<div class="page-head">
	@if ($create)
		<a href="{{ $create_url }}" class="btn btn-labeled btn-primary pull-right">
			<span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
			{{ trans('admin.create')}}
		</a>
	@endif
	<h1>{{ $title }}</h1>
</div>

<div class="content">
	<div class="row">
		<div class="col-xs-12">

			<div class="menu">
			<?php
				// It needs to be refactor, but I like the simple solutuion =)
				function recursive_menu($parent_id = 0)
				{
					$items = Modules\Menu\Database\Models\Menu::whereParent_id($parent_id)->orderBy('position')->get();
					?>

					@if (count($items))
						<ol>
						@foreach ($items as $item)
							<li id="menuItem_{{ $item->id }}">
								<div>
									{{ $item->text }}

									<aside class="buttons">
										<a class="btn btn-info btn-sm" href="{{ URL::route('admin.menu.edit', $item->id) }}">
											<i class="fa fa-edit "></i>  
										</a>

										{{ Form::open(array('url' => URL::route('admin.menu.destroy', $item->id), 'class' => 'delete-destroy', 'method' => 'DELETE')) }}
											<a class="btn btn-danger btn-sm submit">
												<i class="fa fa-trash-o "></i> 
											</a>
										{{ Form::close() }}
									</aside>
								</div>
								<?php
								recursive_menu($item->id);
								?>
							</li>
						@endforeach
						</ol>
					@endif


					<?php
				}
				recursive_menu();
			?>
			</div>

			<span class="save-waiting"></span>
			<span class="save-status"></span>

			<a href="" class="btn btn-labeled btn-success pull-right save-menu">
				<span class="btn-label"><i class="fa fa-save"></i></span>
				{{ trans('admin.save') }}
			</a>

		</div>
	</div>
</div>
@stop