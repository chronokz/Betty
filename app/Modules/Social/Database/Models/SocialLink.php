<?php namespace Modules\Social\Database\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model {

	public $table = 'social_links';

	public $timestamps = false;

	public static $icons = [
		'behance',
		'behance-square',
		'twitter',
		'facebook',
		'facebook-official',
		'facebook-square',
		'flickr',
		'foursquare',
		'google',
		'google-plus',
		'google-plus-square',
		'instagram',
		'linkedin',
		'linkedin-square',
		'odnoklassniki',
		'odnoklassniki-square',
		'openid',
		'pinterest',
		'pinterest-square',
		'reddit',
		'reddit-alien',
		'reddit-square',
		'skype',
		'tumblr',
		'tumblr-square',
		'twitch',
		'twitter',
		'twitter-square',
		'vimeo',
		'vimeo-square',
		'vk',
		'whatsapp',
		'youtube',
		'youtube-play',
		'youtube-square'
	];

	protected $fillable = [
		'title',
		'link',
		'position',
		'icon'
	];

}