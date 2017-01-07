<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Attribute;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function __consturct()
    {
        return $this->middlware('shop.manager');
    }
    public function create($name)
    {
        $product = Product::name($name)->first();
        return view('stock.create', compact('product'));
    }

    public function store(Request $request, $name)
    {
        $product = Product::name($name)->first();
        $product->attributes()->create([
            'name' => $request->attribute_name,
            'stock' => $request->stock,
        ]);
        return redirect()->back()
            ->with('message', 'Product attribute and its stock added.')
            ->with('messageType', 'success');
    }
    public function update(Request $request, $name)
    {
        $attribute = Attribute::find($request->id);
        $attribute->update([
            'name' => $request->attribute_name,
            'stock' => $request->stock,
        ]);
        return redirect()->back()
            ->with('message', 'Stock updated')
            ->with('messageType', 'success');
    }

    public function destroy(Request $request)
    {
        $order = Order::where('submitted', 0)->delete();

        $attribute = Attribute::findOrFail($request->attributeId);

        $attribute->delete();

        return redirect()->back()
            ->with('message', 'Attribute deleted')
            ->with('messageType', 'success');
    }
}
