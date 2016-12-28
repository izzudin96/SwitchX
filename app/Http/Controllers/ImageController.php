<?php

namespace App\Http\Controllers;

use Storage;
use App\Image;
use App\Product;
use Illuminate\Http\Request;

class ImageController extends Controller
{
	public function __construct()
	{
		$this->middleware('shop.manager');
	}

    public function show($name)
    {
        $product = Product::name($name)->first();

        return view('product.image', compact('product'));
    }

    public function store(Request $request, $name)
    {
        Product::uploadImage($request, $name);

        return redirect()->back()
            ->with('message', 'Product image uploaded.')
            ->with('messageType', 'success');
    }

    public function update(Request $request, $name)
    {
        $product = Product::Name($name)->first();

        $oldDefaultImage = $product->images()->where('is_default' , 1)->first();

        if($oldDefaultImage)
        {
            $oldDefaultImage->is_default = 0;

            $oldDefaultImage->save();
        }

        $newDefaultImage = Image::findOrFail($request->image);

        $newDefaultImage->is_default = 1;

        $newDefaultImage->save();

        return redirect()->back()
            ->with('message', 'Default product image updated.')
            ->with('messageType', 'success');
    }

    public function destroy(Request $request)
    {
    	$image = Image::findOrFail($request->image);

    	Storage::delete($image->path);

    	$image->delete();

    	return redirect()->back()
            ->with('message', 'Product image deleted.')
            ->with('messageType', 'success');
    }
}
