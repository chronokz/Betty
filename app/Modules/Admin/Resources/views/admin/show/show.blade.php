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
					{{ Form::open(array('class' => 'form-horizontal')) }}
						
						@foreach ($form as $name => $input)
							<?php

								if (!isset($input['type']))
								{
									$input['type'] = 'text';
								}
								
								if (isset($input['value']))
								{
									$value = $input['value'];
								}
								else if(isset($item->$name))
								{
									$value = $item->$name;
								}

							?>
							<div class="form-group">
								@include('admin::admin.show_input.'.$input['type'])
							</div>
						@endforeach
											
					{{ Form::close() }}
				</div>
			</div>
		</div><!-- ./col -->
	</div>
</div>
@stop