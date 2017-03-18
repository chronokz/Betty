<?php namespace Modules\Menu\Database\Models;
   
use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

	public $table = 'menu';

	public $timestamps = false;

	protected $fillable = ["text","link","position","parent_id","depth","left","right","public"];
    
	public function children()
	{
		return $this->whereParentId($this->id)->orderBy('position')->get();
	}

	public static function hierarchy($parent_id = 0, $only_public = false)
	{

		$items = self::whereParent_id($parent_id)
		if ($only_public)
			$items = $items->wherePublic(1);

		$items = $items->orderBy('position')->get();

		foreach($items as $item)
		{
			$item->items = self::hierarchy($item->id, $only_public);
		}

		return $items;
	}

}
