<?php
	$avatar = Auth::user()->avatar();
?>
<div class="user-box">
	<div class="avatar">
		@if ($avatar && @fopen($avatar, 'r'))
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
