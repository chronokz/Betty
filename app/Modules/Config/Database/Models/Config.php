<?php namespace Modules\Config\Database\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model {

	public $timestamps = false;

	protected $fillable = [
		'name',
		'value',
		'type'
	];

}