<div class="user-box">
	<div class="avatar">
		{{ HTML::Image(Auth::user()->avatar()) }}
	</div>
	<div class="details">
		<p>{{ Auth::user()->name }}</p>
		<span class="position">{{ Auth::user()->email }}</span>
	</div>
</div>