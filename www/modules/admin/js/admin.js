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

$('.colorpicker-holder').each(function()
{
	var color_picker = $(this),
		color_input = $('input[name='+$(this).attr('rel')+']');
	color_picker.ColorPicker({
		color: color_input.val(),
		flat: true,
		onChange: function(hsb, hex, rgb)
		{
			color_input.val('#'+hex);
		}
	});
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
	url = $(this).attr('href');
	$('.save-waiting').show('slow');
	e.preventDefault();
	arraied = $('.menu > ol').nestedSortable('toArray');

	var result = {};
	for (var i in arraied)
	{
		arraied[i]['position'] = i;
		result[arraied[i]['item_id']] = JSON.stringify(arraied[i]);
	}

	$.post(url, result, function(data){
		$('.save-waiting').hide('slow');
		$('.save-status').html(data.status).fadeIn('slow');
		$('.save-menu').removeClass('active');
	});
});

// Clone
/*
* .cloner
*   .js_items
*       .item(style="display:none")
*           - any_elements -
*           a.js_rem_item
*   a.js_add_item
*
*
* */
$('.js_add_item').click(function(){
    $(this).closest('.cloner').find('.item:first')
        .clone(true)
        .fadeIn('slow')
        .appendTo($(this).parent().children('.js_items'));
});

$('.js_rem_item').click(function(){
    $(this).closest('.item').fadeOut('slow', function(){
        $(this).remove();
    });
});

$('.js_up_item').click(function(){
	var item = $(this).closest('.item'),
		item_after = item.prev('.item');

		item_after.before(item);
});