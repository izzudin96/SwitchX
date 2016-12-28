<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Order;
use App\Product;
use App\Attribute;
use Illuminate\Http\Request;

class ItemController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->only('store', 'destroy');
	}

    public function store(Request $request) //authenticated user
    {
        $attribute = $request->attribute;

        $productId = $request->productId;

        $quantity = $request->quantity;

        if(!Attribute::quantityEnough($quantity, $productId, $attribute) == true) //clear
        {
            return redirect()->back()
                            ->with('message', 'The stock is currently limited.')
                            ->with('messageType', 'warning');
        }

        $order = Auth::user()->orders()->firstOrCreate(['submitted' => 0]);

        $productExists = $order->products()->where('id', $productId)->where('attribute', $attribute)->first();

        if(!$productExists)
        {
            $order->products()->attach($productId, ['attribute' => $attribute , 'quantity' => $quantity  ]);

            return redirect()->back()
                            ->with('message', 'New item added to your order form.')
                            ->with('messageType', 'success');
        }

        if($productExists)
        {
            $newQuantity = $this->addQuantity($order->id, $productId, $quantity, $attribute);

            $this->updateOrderedQuantity($newQuantity, $order->id, $productId, $attribute);

            return redirect()->back()
                            ->with('message', 'The product quantity has been updated')
                            ->with('messageType', 'success');
        }
    }
    public function updateOrderedQuantity($quantity, $orderId, $productId, $attribute)
    {
        $query = DB::table('order_product')
            ->where('order_id', $orderId)
            ->where('product_id', $productId)
            ->where('attribute', $attribute)
            ->update(['quantity' => $quantity]);
    }
    public function destroy(Request $request, $id)
    {
        $order = Order::currentOrder();

        $query = DB::table('order_product')
            ->where('order_id', $order->id)
            ->where('product_id', $id)
            ->where('attribute', $request->attribute)
            ->delete();

        return redirect()->back()
                            ->with('message', 'Item has been removed from the order list.')
                            ->with('messageType', 'info');
    }

    public function addQuantity($orderId, $productId, $quantity, $attribute)
    {
        $product = Order::find($orderId)
            ->products()->where('id', $productId)
            ->where('attribute', $attribute)
            ->first();

        $productQuantity = $product->pivot->quantity + $quantity;

        return $productQuantity;
    }
    
    public function productQuantity($id, $size)
    {
        $quantity = Product::findOrFail($id)->$size;

        return $quantity;
    }
}
