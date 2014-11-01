<?php namespace Modules\Pages\Database\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

	protected $fillable = [
		'title',
		'alias',
		'content',
		'public',
		'meta_keywords',
		'meta_description',
	];

}