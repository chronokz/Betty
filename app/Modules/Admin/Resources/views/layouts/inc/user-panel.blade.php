<li class="dropdown widget-user">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		@if ($avatar = Auth::user()->avatar())
			{{ HTML::Image($avatar, '', ['class' => 'pull-left']) }}
		@else
			{{ admin_img('img/avatar.jpg', '', ['class' => 'pull-left']) }}
		@endif
		<span>{{ Auth::user()->name }} <i class="fa fa-caret-down"></i></span>
	</a>
	<ul class="dropdown-menu">
		<li>
			<a href="{{ URL::route('admin.config.index') }}"><i class="fa fa-cog"></i>Настройки сайта</a>
		</li>
		<li>
			<a href="{{ URL::route('admin.users.edit', Auth::user()->id) }}"><i class="fa fa-user"></i>Профиль</a>
		</li>
		<li class="footer">
			<a href="{{ URL::route('admin.logout') }}"><i class="fa fa-power-off"></i>Выход</a>
		</li>
	</ul>
</li>