<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['path', 'is_default'];

    public function imageable()
    {
    	return $this->morphTo();
    }
}
