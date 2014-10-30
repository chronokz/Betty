<div class="user-box">
	<div class="avatar">
		{{ admin_img('img/avatar.jpg') }}
	</div>
	<div class="details">
		<p>{{ Auth::user()->name }}</p>
		<span class="position">{{ Auth::user()->email }}</span>
	</div>
</div>