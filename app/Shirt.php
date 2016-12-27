<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shirt extends Model
{
    use Itemable;
    use Imageable;

    protected $fillable = ['name','description','price','xxs','xs','s','m','l','xl','xxl','xxxl'];

    protected $sizes = ['xxs','xs','s','m','l','xl','xxl','xxxl'];

    public function stock(Shirt $shirt)
    {
    	foreach ($this->sizes as $size) {
    		$stock[] = $shirt->$size;
    	}

    	return array_sum($stock);
    }

    public function scopeName($query, $name)
    {
    	$name = str_replace('-', ' ', $name);

    	return $query->where(compact('name'));
    }

    public function uri($name)
    {
    	return str_replace(' ', '-', $name);
    }
}
