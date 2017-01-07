<?php

namespace App\Http\Controllers;

use Auth;
use App\Order;
use App\Status;
use App\Product;
use App\Shipping;
use App\Attribute;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
        $this->middleware('order.owner')->only('show'); //and shop manager

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

        if($order->products()->exists() == false)
        {
            return redirect('/')
                ->with('message', 'Please add a product to proceed the order.')
                ->with('messageType', 'info');
        }

        $products = $order->products()->get();

        $shipping = $this->applyShipping($products);

        $grandTotalPrice = $order->amount($order);

        return view('order.create', compact('order', 'grandTotalPrice', 'shipping'));
    }

    public function submit(Request $request)
    {
        $order = Order::currentOrder();

        $products = $order->products()->get();

        if(!$order->validateQuantity($products) == true)
        {
            return redirect()->back()
                    ->with('message', 'Please remove items that have more quantity than stock.')
                    ->with('messageType', 'danger');
        }

        $this->saveOrder($order, $request);

        Attribute::deductStock($products);

        return redirect('order');
    }

    public function applyShipping($products)
    {
        if(Shipping::first())
        {
            $unit = $products->first()->postUnit * $products->first()->pivot->quantity;

            $box = Shipping::SuitableBox($unit);

            if(!$box->exists())
            {
                $box = Shipping::BiggestBox();

                $price = $unit/$box->unit * $box->price;

                return $price;
            }

            return $box->price;
        }
        
        return 0;
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        
        return view('order.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->status = $request->status;

        $order->payment_status = $request->payment_status;

        $order->post_tracking = $request->post_tracking;

        $order->shippingCost = $request->shippingCost;

        $order->save();

        return redirect()->back()
                    ->with('message', 'Order information updated.')
                    ->with('messageType', 'success');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        $order->delete();

        return redirect('/')
                    ->with('message', 'Order deleted.')
                    ->with('messageType', 'success');
    }

    public function saveOrder(Order $order, $request)
    {
        $order->amount = $order->amount($order);

        $order->shippingCost = $this->applyShipping($order->products());

        $order->submitted = 1;

        $order->status = 'Processing order...';

        $order->items = $order->products()->get()->toJson();

        $order->update($request->all());
    }
}
