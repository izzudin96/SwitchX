<?php

namespace App;

use App\Image;

trait Imageable 
{
	public function images()
	{
		return $this->morphMany(Image::class, 'imageable');
	}

	public static function uploadImage($request, $product)
    {
        $product = Product::name($product)->first();

        $file = $request->file('image');

        $path = $file->store('public/product_images/' . $product->id);

        $product->images()->create(['path' => $path]);
    }
}