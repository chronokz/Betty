<?php namespace Modules\Users\Database\Models;
   
use Illuminate\Database\Eloquent\Model;

class Group extends Model {

	public $timestamps = false;

	protected $table = 'groups';

    protected $fillable = ["name"];

}