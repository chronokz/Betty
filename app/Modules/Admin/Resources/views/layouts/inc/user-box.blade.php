<div class="user-box">
	<div class="avatar">
		@if ($avatar = Auth::user()->avatar())
			{{ HTML::Image($avatar) }}
		@else
			{{ admin_img('img/avatar.jpg') }}
		@endif
	</div>
	<div class="details">
		<p>{{ Auth::user()->name }}</p>
		<span class="position">{{ Auth::user()->email }}</span>
	</div>
</div>