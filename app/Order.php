<?php

namespace App;

use Auth;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = [
		'name', 'address', 'city', 'poscode', 'state', 'phone', 'status', 'post_tracking', 'items'
	];

	protected $casts = [
		'items' => 'json'
	];

	public function products()
	{
		return $this->belongsToMany(Product::class)->withPivot('attribute', 'quantity');
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	
	public function scopeLatest($query)
	{
		return $query->orderBy('id', 'desc')->paginate(10);
	}

	public function scopeCurrentOrder($query)
	{
		return $query->where('user_id', Auth::user()->id)->where('submitted', 0)->first();
	}

	public function scopeUserSubmittedOrders($query)
	{
		return $query->where('user_id', Auth::user()->id)->where('submitted', 1)->orderBy('id', 'desc')->paginate(5);
	}

	public static function validateQuantity($products)
	{
		foreach ($products as $product) 
		{
			$currentStock = Product::CurrentStock($product->id, $product->pivot->attribute);

			if($product->pivot->quantity > $currentStock)
			{
				return false;
			}
			return true;
		}
	}

	public function amount(Order $order)
    {
        $grandTotalPrice = 0;

        foreach ($order->products()->get() as $product) 
        {
            $totalPrice = $product->price * $product->pivot->quantity;

            $grandTotalPrice = $totalPrice + $grandTotalPrice;
        }

        return $grandTotalPrice;
    }
}
