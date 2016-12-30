<?php

namespace App;

use Auth;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = [
		'name', 'address', 'city', 'poscode', 'state', 'phone', 'status', 'post_tracking',
	];
	public function products()
	{
		return $this->belongsToMany(Product::class)->withPivot('attribute', 'quantity');
	}
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function scopeCurrentOrder($query)
	{
		return $query->where('user_id', Auth::user()->id)->where('submitted', 0)->first();
	}

	public function scopeUserSubmittedOrders($query)
	{
		return $query->where('user_id', Auth::user()->id)->where('submitted', 1)->get();
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
}
