<?php namespace Modules\Bulk\Database\Models;
   
use Illuminate\Database\Eloquent\Model;

class Bulk extends Model {

	public $table = 'bulk';

    protected $fillable = ["name","subject","message"];

}