<?php namespace Modules\Social\Database\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model {

	public $table = 'social_links';

	public $timestamps = false;

	public static $icons = [
		'skype',
		'twitter',
		'facebook-square',
		'vk'
	];

	protected $fillable = [
		'title',
		'link',
		'icon'
	];

}