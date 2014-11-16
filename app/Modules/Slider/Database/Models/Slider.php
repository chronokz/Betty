<?php namespace Modules\Slider\Database\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model {

	public $table = 'slider';

	public $timestamps = false;

	protected $fillable = [
		'title',
		'description',
		'link',
		'image'
	];

}