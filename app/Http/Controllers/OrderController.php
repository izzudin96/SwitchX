<?php

namespace App\Http\Controllers;

use Auth;
use App\Order;
use App\Status;
use App\Product;
use App\Attribute;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
        $this->middleware('order.owner')->only('show');

        $this->middleware('shop.manager')->only('edit', 'update');
    }

    public function index()
    {
    	$orders = Order::UserSubmittedOrders();

    	return view('order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        $items = json_decode($order->items);

        return view('order.show', compact('order', 'items'));
    }

    
    public function create()
    {
        $order = Order::CurrentOrder();

        if($order->exists() == false) 
        {
            return redirect('/')
                ->with('message', 'Please add a product to proceed the order.')
                ->with('messageType', 'info');
        }

        $grandTotalPrice = 0;

        foreach ($order->products()->get() as $product) 
        {
            $totalPrice = $product->price * $product->pivot->quantity;

            $grandTotalPrice = $totalPrice + $grandTotalPrice;
        }

        return view('order.create', compact('order', 'grandTotalPrice'));
    }

    public function submit(Request $request)
    {
        $order = Order::currentOrder();

        $products = $order->products()->get();

        if(!$order->validateQuantity($products) == true)
        {
            return redirect()->back()
                    ->with('message', 'Please remove items that have more quantity than stock')
                    ->with('messageType', 'danger');
        }
        $order = Order::currentOrder();

        $grandTotalPrice = 0;

        foreach ($order->products()->get() as $product) 
        {
            $totalPrice = $product->price * $product->pivot->quantity;

            $grandTotalPrice = $totalPrice + $grandTotalPrice;
        }

        $order->amount = $grandTotalPrice;

        $order->submitted = 1;

        $order->items = $order->products()->get()->toJson();

        $order->update($request->all());

        Attribute::deductStock($products);

        return redirect('order');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $statuses = Status::all();
        return view('order.edit', compact('order', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->update($request->all());

        return redirect()->back()
                    ->with('message', 'Order information updated')
                    ->with('messageType', 'success');
    }
}
