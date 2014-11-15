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
			<a href="{{ URL::route('admin.home') }}" class="logo"><i class="fa fa-gears"></i> <span>Black Betty</span></a>
			<nav class="navbar navbar-static-top">
				<a href="#" class="navbar-btn sidebar-toggle">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<div class="navbar-right">
					<ul class="nav navbar-nav">
						<li class="dropdown dropdown-notifications">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-bell"></i><span class="label label-warning">5</span>
							</a>
							<ul class="dropdown-menu">
								<li class="header"><i class="fa fa-bell"></i>  You have 5 new notifications</li>
								<li>
									<ul>
										<li><a href="#"><i class="fa fa-users success"></i> New user registered</a></li>
										<li><a href="#"><i class="fa fa-heart info"></i> Jane liked your post</a></li>
										<li><a href="#"><i class="fa fa-envelope warning"></i> You got a message from Jean</a></li>
										<li><a href="#"><i class="fa fa-info success"></i> Privacy settings have been changed</a></li>
										<li><a href="#"><i class="fa fa-comments danger"></i> New comments waiting approval</a></li>
									</ul>
								</li>
								<li class="footer"><a href="#">View all notification</a></li>
							</ul>
						</li>
						
						<li class="dropdown dropdown-messages">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-envelope"></i><span class="label label-success">6</span>
							</a>
							<ul class="dropdown-menu">
								<li class="header"><i class="fa fa-envelope"></i> You have 6 messages</li>
								<li>
									<ul>
										<li>
											<a href="#">
												<div class="pull-left"><img src="img/avatar2.jpg" class="img-rounded" alt="image"/></div>
												<h4>Jill Doe<small><i class="fa fa-clock-o"></i> 1 mins</small></h4>
												<p>Can we meet somewhere?</p>
											</a>
										</li>
										
										<li>
											<a href="#">
												<div class="pull-left"><img src="img/avatar.jpg" class="img-rounded" alt="image"/></div>
												<h4>John Doe<small><i class="fa fa-clock-o"></i> 2 mins</small></h4>
												<p>Please send me a new email.</p>
											</a>
										</li>
										
										<li>
											<a href="#">
												<div class="pull-left"><img src="img/avatar3.jpg" class="img-rounded" alt="image"/></div>
												<h4>Jeremy Doe<small><i class="fa fa-clock-o"></i> 30 mins</small></h4>
												<p>Don't forget to subscribe to...</p>
											</a>
										</li>
										
										<li>
											<a href="#">
												<div class="pull-left"><img src="img/avatar4.jpg" class="img-rounded" alt="image"/></div>
												<h4>Jean Doe<small><i class="fa fa-clock-o"></i> 2 hours</small></h4>
												<p>I sent you a mail about me.</p>
											</a>
										</li>
									</ul>
								</li>
								<li class="footer"><a href="#">View all messages</a></li>
							</ul>
						</li>
						
						<li class="dropdown dropdown-tasks">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-tasks"></i><span class="label label-danger">1</span>
							</a>
							<ul class="dropdown-menu">
								<li class="header"><i class="fa fa-tasks"></i>  You have 1 new task</li>
								<li>
									<ul>
										<li>
											<a href="#">
												<h3>PHP Developing<small class="pull-right">32%</small></h3>
												<div class="progress">
													<div class="progress-bar progress-bar-success" style="width: 32%" role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</a>
										</li>
										<li>
											<a href="#">
												<h3>Database Repair<small class="pull-right">14%</small></h3>
												<div class="progress">
													<div class="progress-bar progress-bar-warning" style="width: 14%" role="progressbar" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</a>
										</li>
										<li>
											<a href="#">
												<h3>Backup Create<small class="pull-right">65%</small></h3>
												<div class="progress">
													<div class="progress-bar progress-bar-info" style="width: 65%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</a>
										</li>
										<li>
											<a href="#">
												<h3>Create New Modules<small class="pull-right">80%</small></h3>
												<div class="progress">
													<div class="progress-bar progress-bar-danger" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</a>
										</li>
									</ul>
								</li>
								<li class="footer">
									<a href="#">View all tasks</a>
								</li>
							</ul>
						</li>
						
						<li class="dropdown widget-user">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								{{ admin_img('img/avatar.jpg', '', ['class' => 'pull-left']) }}
								<span>John Doe <i class="fa fa-caret-down"></i></span>
							</a>
							<ul class="dropdown-menu">
								<li>
									<a href="#"><i class="fa fa-cog"></i>Settings</a>
								</li>
								<li>
									<a href="profile.html"><i class="fa fa-user"></i>Profile</a>
								</li>
								<li class="footer">
									<a href="#"><i class="fa fa-power-off"></i>Logout</a>
								</li>
							</ul>
						</li>
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
								<div class="alert alert-success">
									<ul>
									<?php
										$messages = Session::get('message.success');
										// If will be show some errors with string uncommented it
										// if (!is_string($messages))
										// {
										// 	$messages = $messages->all();
										// }
									?>
									@foreach ((array)$messages as $m)
										<li>{{ $m }}</li>
									@endforeach
									</ul>
								</div>
							@endif
							@if (Session::has('message.error'))
								<div class="alert alert-danger">
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