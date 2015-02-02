@extends('main::layouts.master')

@section('content') 

<div class="row featurette">
  <div class="col-md-7">
    <h2 class="featurette-heading"><span class="text-muted">{{ $intro->title }}</span></h2>
    <p class="lead">{{ $intro->content }}</p>
  </div>
  <div class="col-md-5">
    {{ HTML::image('uploads/content/images/458x458.jpg', 'Generic placeholder image') }}
  </div>
</div>

@stop