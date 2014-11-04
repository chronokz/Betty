@extends('admin::layouts.master')

@section('content')	

<div class="page-head">
	<h1>{{ $title }}  <small>{{ $sub_title }}</small></h1>
</div>

<div class="content">
	<div class="row">	
		<div class="col-md-12">
            <div class="box">
                <div class="box-title">
                   <h3>{{ $form_title }}</h3>
                </div>
                <div class="box-body">
					{{ Form::open(array('url' => $save_url, 'class' => 'form-horizontal', 'method' => $method)) }}
						
						@foreach ($form as $name => $input)
							<?php
								$class = '';
								if (Session::has('message.error') && Session::get('message.error')->has($name))
								{
									$class = 'has-error';
								}

							?>
							<div class="form-group {{ $class }}">
								@include('admin::admin.form_input.'.$input['type'])
							</div>
						@endforeach
											
					{{ Form::close() }}
				</div>
			</div>
		</div><!-- ./col -->
	</div>
</div>
@stop