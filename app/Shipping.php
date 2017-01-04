<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = ['name', 'unit', 'price'];

    public function scopeSuitableBox($query, $totalUnit)
    {
        $box = $query->where('unit', '>=', $totalUnit)
                            ->orderBy('price', 'asc')
                            ->first();
        return $box;
    }

    public function scopeBiggestBox($query)
    {
        $box = $query->orderBy('unit', 'desc')->first();

        return $box;
    }
}
