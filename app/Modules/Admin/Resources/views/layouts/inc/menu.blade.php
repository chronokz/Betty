<?php
	$menu = Config::get('admin::admin_menu');
	$url = URL::current();
?>

<ul class="sidebar-menu">

	@foreach ($menu as $item)
		<li{{ ($url == $item['url']?' class="active"':'') }}>
			<a href="{{ $item['url'] }}">
				<i class="fa fa-{{ $item['icon'] }}"></i>
				<span>{{ $item['text'] }}</span>
			</a>
		</li>
	@endforeach

	@if (Auth::user()->group_id == 2)
		<li style="border-top: 1px solid #191919">
			<a href="{{ URL::route('admin.code.index') }}">
				<i class="fa fa-code"></i>
				<span>Разработка</span>
			</a>
		</li>
	@endif

	<!-- 
	For examples:
		Simple menu:
		<li>
			<a href="widgets.html">
				<i class="fa fa-th"></i> <span>Widgets</span>
				<small class="label label-success pull-right">new</small>
			</a>
		</li>

		External menu:
		<li class="sub-nav">
			<a href="#">
				<i class="fa fa-folder"></i> <span>Other Pages</span>
				<i class="fa fa-angle-right pull-right"></i>
			</a>
			<ul class="sub-menu">
				<li><a href="404.html">404 Error</a></li>
				<li><a href="blank.html">Blank Page</a></li>
				<li><a href="invoice.html">Invoice</a></li>
				<li><a href="login.html">Login</a></li>
				<li><a href="register.html">Register</a></li>
				<li><a href="lockscreen.html">Lockscreen</a></li>
				<li><a href="timeline.html">Timeline</a></li>
			</ul>
		</li>
	-->

</ul>