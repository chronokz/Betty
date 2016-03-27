<?php namespace Modules\Subscribers\Database\Models;
   
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model {

    protected $fillable = ["name","email"];

}