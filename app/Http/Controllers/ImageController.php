<?php

namespace App\Http\Controllers;

use Storage;
use App\Image;
use App\Shirt;
use Illuminate\Http\Request;

class ImageController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');

		$this->middleware('shop.manager');
	}

    public function show($name)
    {
        $shirt = Shirt::name($name)->first();

        return view('shirt.image', compact('shirt'));
    }

    public function store(Request $request, $name)
    {
        Shirt::uploadImage($request, $name);

        return redirect()->back();
    }

    public function update(Request $request, $name)
    {
        $shirt = Shirt::Name($name)->first();

        $oldDefaultImage = $shirt->images()->where('is_default' , 1)->first();

        if($oldDefaultImage)
        {
            $oldDefaultImage->is_default = 0;

            $oldDefaultImage->save();
        }

        $newDefaultImage = Image::findOrFail($request->image);

        $newDefaultImage->is_default = 1;

        $newDefaultImage->save();

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
    	$image = Image::findOrFail($request->image);

    	Storage::delete($image->path);

    	$image->delete();

    	return redirect()->back();
    }
}
