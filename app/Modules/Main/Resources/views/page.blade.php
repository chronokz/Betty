@extends('main::layouts.master')

@section('content') 

<h1 class="featurette-heading text-muted">{{ $page->title }}</h1>

<hr class="featurette-divider">

<div class="content">
	{{ $page->content }}
</div>

@stop