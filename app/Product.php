<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //use Orderable;
    use Imageable;

    protected $fillable = ['name','description','price','xxs','xs','s','m','l','xl','xxl','xxxl'];

    protected $sizes = ['xxs','xs','s','m','l','xl','xxl','xxxl'];

    public function Orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    public function stock(Product $product)
    {
    	foreach ($this->sizes as $size) {
    		$stock[] = $product->$size;
    	}

    	return array_sum($stock);
    }

    public function scopeName($query, $name)
    {
    	$name = str_replace('-', ' ', $name);

    	return $query->where(compact('name'));
    }

    public function scopeCurrentStock($query, $productId, $attribute)
    {
        $stock = $query->where('id', $productId)
            ->first()
            ->attributes()
            ->where('name', $attribute)
            ->first()
            ->stock;

        return $stock;
    }

    public function uri($name)
    {
    	return str_replace(' ', '-', $name);
    }
}
