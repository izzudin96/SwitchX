<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = [
		'name', 'address', 'city', 'poscode', 'state', 'phone', 'status', 'post_tracking',
	];


	public function orderedBy()
	{
		return $this->belongsTo(User::class);
	}

	public function shirts()
	{
		return $this->morphedByMany(Shirt::class, 'itemable')->withPivot('quantity', 'attribute');
	}

	public function scopeCurrentOrder($query)
	{
		return $query->where('user_id', Auth::user()->id)->where('submitted', 0)->first();
	}

	public function scopeUserSubmittedOrders($query)
	{
		return $query->where('user_id', Auth::user()->id)->where('submitted', 1)->get();
	}
}
