<?php
	$unreaded_feedback = Modules\Feedback\Database\Models\Feedback::whereReaded(0)->get();
?>

<li class="dropdown dropdown-notifications">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<i class="fa fa-bell"></i>
		@if (count($unreaded_feedback))
			<span class="label label-warning">{{ count($unreaded_feedback) }}</span>
		@endif
	</a>
	<ul class="dropdown-menu">
		<li class="header"><i class="fa fa-bell"></i>  
		@if (count($unreaded_feedback))
			У вас есть новые уведомления
		@else
			Новых уведомлений нет
		@endif
		</li>
		<li>
			<ul>
				@foreach ($unreaded_feedback as $item)
				<li>
					<a href="{{ URL::route('admin.feedback.show', $item->id) }}">
						@if ($item->created_at->format('Y') > 0)
							<small class="pull-right"><i class="fa fa-clock-o"></i> {{ $item->created_at }} </small>
						@endif
						<i class="fa fa-envelope danger"></i> Получена новая завяка от {{ $item->name }}
					</a>
				</li>
				@endforeach
			</ul>
		</li>
	</ul>
</li>
