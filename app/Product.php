<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Imageable;

    protected $fillable = ['name','description','price', 'postUnit'];

    public function Orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    public function totalStock(Product $product)
    {
        $totalStock = 0;

        $attributes = $product->attributes()->where('product_id', $product->id)->get();

        foreach ($attributes as $attribute) {
            $totalStock = $totalStock + $attribute->stock;
        }

        return $totalStock;
    }

    public function scopeName($query, $name)
    {
    	$name = str_replace('-', ' ', $name);

    	return $query->where(compact('name'));
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('id', 'desc')->paginate(9);
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
