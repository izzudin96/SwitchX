<?php

namespace App;

use App\Image;

trait Imageable 
{
	public function images()
	{
		return $this->morphMany(Image::class, 'imageable');
	}

	public static function uploadImage($request, $shirtName)
    {
        $shirt = Shirt::name($shirtName)->first();

        $file = $request->file('image');

        $path = $file->store('public/shirt_images/' . $shirt->id);

        $shirt->images()->create(['path' => $path]);
    }
}