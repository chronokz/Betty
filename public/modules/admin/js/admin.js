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