@extends('admin::layouts.master')

@section('content')

<div class="content">
    <div class="row">
        <div class="col-xs-12">
			<div class="box">
				<div class="box-title">
					<h3>Выбранный шаблон</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<div class="panel panel-default">
							<div class="panel-heading">От кого</div>
							<div class="panel-body">
								<div class="form-group">
									<label for="from_name">Имя</label>
									<input type="text" class="form-control" placeholder="Имя" value="{{ $from_name }}" id="from_name">
								</div>
								<div class="form-group">
									<label for="from_email">E-mail</label>
									<input type="email" class="form-control" placeholder="E-mail" value="{{ $from_email }}" id="from_email">
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="panel panel-default">
							<div class="panel-heading">Тема письма</div>
							<div class="panel-body">
								{{ $template->subject }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="panel panel-default">
							<div class="panel-heading">Текст письма</div>
							<div class="panel-body">
								{{ $template->message }}
							</div>
						</div>
					</div>
					<center class="form-group">
						<button class="btn btn-danger btn-lg js-startbulk">Начать</button>
					</center>
				</div>
			</div>

            <div class="box">
                <div class="box-title">
                    <h3>Подписчики</h3>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-striped">
						<thead>
							<tr>
								<th width="1"><input type="checkbox" class="js-checkall" checked></th>
								<th>E-mail</th>
								<th>Имя</th>
							</tr>
						</thead>
						<tbody class="js-subscriberlist">
							@foreach($subscribers as $user)
							<tr>
								<td class="user_id">
									<input type="checkbox" value="{{ $user->id }}" checked>
								</td>
								<td class="user_email">
									{{ $user->email }}
								</td>
								<td class="user_name">
									{{ $user->name }}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
	@parent
	<script>
		function send_mail()
		{
			var input = $('.js-subscriberlist input:checked:first'),
				user_id = input.val(),
				user_name = $.trim(input.closest('tr').children('.user_name').text()),
				user_email = $.trim(input.closest('tr').children('.user_email').text()),
				from_name = $('#from_name').val(),
				from_email = $('#from_email').val();

				if (!from_email || !from_name)
				{
					alert('Заполните поля отправителя');
					$('#from_name').focus();
				}
				else
				{
					$.ajax({
						url: '{{ URL::route('admin.bulk.send', $template->id) }}',
						data: {user_id: user_id, user_name: user_name, user_email: user_email, from_name: from_name, from_email: from_email},
						method: 'post',
						success: function(data)
						{
							input.replaceWith('<i class="fa fa-check-circle" style="color:green"></i>');
							if ($('.js-subscriberlist input:checked').length)
								setTimeout('send_mail()', 1000);
						}
					});
				}
		}

		$('.js-startbulk').click(function(){
			$(this).prop('disabled', true);
			send_mail()
		});

		$('.js-checkall').click(function(){
			if($(this).prop('checked'))
			{
				$('.js-subscriberlist input').prop('checked', true);
			}
			else
			{
				$('.js-subscriberlist input').prop('checked', false);
			}
		});
	</script>
@endsection