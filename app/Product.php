<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //use Orderable;
    use Imageable;

    protected $fillable = ['name','description','price'];

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
        return 'has stock';
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
