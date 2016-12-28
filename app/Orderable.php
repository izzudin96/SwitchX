<?php 

namespace App;

trait Orderable
{
	public function items()
	{
		return $this->morphToMany(Order::class)->withPivot('quantity', 'attribute');
	}
}