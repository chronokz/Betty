<?php

function lang_date($date)
{
	$lang = app()->getLocale();

	$month['en'] = [
		'january',
		'february',
		'march',
		'april',
		'may',
		'june',
		'july',
		'august',
		'september',
		'october',
		'november',
		'december'
	];

	$month['ru'] = [
		'января',
		'февраля',
		'марта',
		'апреля',
		'мая',
		'июня',
		'июля',
		'августа',
		'сентября',
		'октября',
		'ноября',
		'декабря',
	];

	$month['kz'] = [
		'қаңтар',
		'ақпан',
		'наурыз',
		'сәуір',
		'мамыр',
		'маусым',
		'шілде',
		'тамыз',
		'қыркүйек',
		'қазан',
		'қараша',
		'желтоқсан',
	];

	return str_ireplace($month['en'], $month[$lang], $date);
}

function format_date($date, $format = 'j F Y')
{
	if ($date)
		return lang_date(date($format, strtotime($date)));
	else
		return null;
}
