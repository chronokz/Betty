<?php namespace Modules\Users\Database\Models;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Model implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 * The fillable attributes.
	 * 
	 * @var array
	 */
	protected $fillable = [
		'name',
		'username',
		'email',
		'password',
		'remember_token',
		'avatar',
		'group_id'
	];

    /**
     * Set password attribute.
     *
     * @param $value
     */
    public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = Hash::make($value);
	}

	public function avatar()
	{
		return asset('uploads/users/avatar/'.$this->attributes['avatar']);
	}

}
