<?php namespace Modules\Products\Database\Models;
   
use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = ["name","alias","image","images","description","price"];

}