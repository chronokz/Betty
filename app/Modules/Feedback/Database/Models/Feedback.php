<?php namespace Modules\Feedback\Database\Models;
   
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model {

	protected $table = 'feedback';

    protected $fillable = ["name","email","telephone","message"];

}