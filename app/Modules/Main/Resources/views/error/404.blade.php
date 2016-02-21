@extends('main::layouts.master')

@section('title') {{ $config['title'] }} - Страница не найдена @endsection

@section('content')
<div class="container">
	<div class="row main-row">
		<div class="col-md-9">
					
			<div class="main-content post-page">
				<div class="post-one-page">
					<h1>404</h1> 
					<div class="content">страница не найдена</div>
				</div>
			</div>

		</div>	
		@include('main::inc.sidebar')	
	</div>
</div> 
@endsection