@extends('main::layouts.master')

@section('content') 

<div class="row featurette">
  <div class="col-md-12">
    <h2 class="featurette-heading"><span class="text-muted">{{ $intro->title }}</span></h2>
    <p class="lead">{{ $intro->content }}</p>
  </div>
</div>

@stop