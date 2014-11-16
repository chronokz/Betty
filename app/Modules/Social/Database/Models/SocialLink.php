<?php namespace Modules\Social\Database\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model {

	public $table = 'social_links';

	public $timestamps = false;

	public static $icons = [
		'skype' => 'skype',
		'twitter' => 'twitter',
		'facebook-square' => 'facebook-square',
		'vk' => 'vk',
	];

	protected $fillable = [
		'title',
		'link',
		'icon'
	];

}