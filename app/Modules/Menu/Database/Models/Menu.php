<?php namespace Modules\Menu\Database\Models;
   
use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

	public $table = 'menu';

	public $timestamps = false;

    protected $fillable = ["text","link","position","parent_id","depth","left","right","public"];

}