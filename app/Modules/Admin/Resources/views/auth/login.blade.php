@extends('admin::layouts.auth')

@section('content')

<div class="box">
	<div class="header clearfix">
		<div class="pull-left"><i class="fa fa-sign-in"></i> Вход</div>
	</div>
	{{ Form::open() }}
		@if(Session::has('error'))
		   <div class="alert alert-danger no-radius no-margin padding-sm">
				<i class="fa fa-info-circle"></i>
				{{ Session::get('error') }}
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
		   </div>
		@endif
		<div class="box-body padding-md">
			<div class="form-group">
				{{ Form::label('username', 'Логин:') }}
				{{ Form::text('username', null, ['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('password', 'Пароль:') }}
				{{ Form::password('password', ['class' => 'form-control']) }}
			</div>
			<div class="box-footer">                                                               
				{{ Form::submit('Войти', ['class' => 'btn btn-block btn-primary']) }}
			</div>
		</div>
	{{ Form::close() }}
</div>
@stop