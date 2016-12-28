<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ['name', 'stock'];
    public function items()
    {
        return $this->belongsTo(Product::class);
    }

    public static function quantityEnough($quantityRequested, $productId, $attribute)
    {
        if($quantityRequested > Product::find($productId)->attributes()->where('name', $attribute)->first()->stock)
        {
            return false;
        }
        return true;
    }
    public static function deductStock($products)
    {
        foreach ($products as $product)
        {
            $currentStock = Attribute::where('product_id', $product->id)
                                ->where('name', $product->pivot->attribute)->first();
            $newStockCount = $currentStock->stock - $product->pivot->quantity;
            
            $currentStock->stock = $newStockCount;

            $currentStock->save();
        }
    }
}
