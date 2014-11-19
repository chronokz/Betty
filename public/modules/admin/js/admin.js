$('form .submit').click(function(){
	$(this).closest('form').submit();
});

$('.delete-destroy').submit(function(){
	if (!confirm('Вы действительно хотите удалить?'))
		return false;
});

$('.wysiwyg').each(function(){
	CKEDITOR.replace($(this).attr('id'));
});


$('.menu > ol').nestedSortable({
	handle: 'div',
	items: 'li',
	toleranceElement: '> div',
	change: function()
	{
		$('.save-menu').addClass('active');
		$('.save-status').fadeOut('slow');
	}
});

$('.save-menu').click(function(e){
	$('.save-waiting').show('slow');
	e.preventDefault();
	arraied = $('.menu > ol').nestedSortable('toArray');

	var result = {};
	for (var i in arraied)
	{
		arraied[i]['position'] = i;
		result[arraied[i]['item_id']] = JSON.stringify(arraied[i]);
	}

	$.post('', result, function(data){
		$('.save-waiting').hide('slow');
		$('.save-status').html(data.status).fadeIn('slow');
		$('.save-menu').removeClass('active');
	});
});