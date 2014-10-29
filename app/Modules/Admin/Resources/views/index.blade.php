@extends('admin::layouts.master')

@section('content')
	
	<h1>Welcome {{ Auth::user()->name }}</h1>
	
	<a href="{{ url('admin/logout') }}">Logout</a>
	
@stop