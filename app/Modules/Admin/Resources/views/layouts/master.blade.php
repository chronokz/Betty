<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Betty - Admin Panel</title>
		
		<!-- Stylesheets -->
		{{ admin_css('css/bootstrap.min.css') }}
		{{ admin_css('css/font-awesome.min.css') }}
		{{ admin_css('css/animate/animate.min.css') }}
		{{ admin_css('css/style.css') }}
		{{ admin_css('css/admin.css') }}
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			{{ admin_js('vendor/html5shiv/html5shiv.js') }}
			{{ admin_js('vendor/respond/respond.min.js') }}
		<![endif]-->

	</head>
	<body class="fixed">
		<!-- Header -->
		<header>
			<a href="{{ URL::route('admin.home') }}" class="logo"><i class="fa fa-bitcoin"></i> <span>Betty</span></a>
			<nav class="navbar navbar-static-top">
				<a href="#" class="navbar-btn sidebar-toggle">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div class="navbar-right">
					<ul class="nav navbar-nav">
						@include('admin::layouts.inc.notifications')
						@include('admin::layouts.inc.user-panel')
					</ul>
				</div>
			</nav>
		</header>
		<!-- /.header -->

				<!-- wrapper -->
				<div class="wrapper">
					<div class="leftside">
						<div class="sidebar">
							@include('admin::layouts.inc.user-box')
							@include('admin::layouts.inc.menu')
						 </div>
					</div>
					<div class="rightside">
		
						<!-- Messages -->
						@if (Session::has('message'))
							
							@if (Session::has('message.success'))
								<div class="alert alert-success no-radius">
									<?php
										$messages = Session::get('message.success');
									?>

									@if (is_string($messages))
										{{ $messages }}
									@else
										<ul>
											@foreach ((array)$messages as $m)
												<li>{{ $m }}</li>
											@endforeach
										</ul>
									@endif

								</div>
							@endif
							@if (Session::has('message.error'))
								<div class="alert alert-danger no-radius">
									<ul>
									@foreach (Session::get('message.error')->all() as $m)
										<li>{{ $m }}</li>
									@endforeach
									</ul>
								</div>
							@endif
						@endif

						@yield('content')
					</div>
				</div><!-- /.wrapper -->


		<!-- Javascript -->
		{{ admin_js('js/plugins/jquery/jquery-1.10.2.min.js') }}
		{{ admin_js('js/plugins/jquery-ui/jquery-ui-1.10.4.min.js') }}
		
		<!-- Bootstrap -->
		{{ admin_js('js/plugins/bootstrap/bootstrap.min.js') }}
		{{ admin_js('js/plugins/ckeditor/ckeditor.js') }}
		{{ admin_js('js/plugins/ckfinder/ckfinder.js') }}
		
		<!-- Interface -->
		{{ admin_js('js/plugins/slimScroll/jquery.slimscroll.min.js') }}
		{{ admin_js('js/plugins/pace/pace.min.js') }}
		
		<!-- Forms -->
		{{ admin_js('js/custom.js') }}
		{{ admin_js('js/admin.js') }}
	</body>
</html>