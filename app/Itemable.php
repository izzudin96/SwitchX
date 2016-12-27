<?php 

namespace App;

trait Itemable
{
	public function items()
	{
		return $this->morphToMany(Order::class)->withPivot('quantity');
	}
}