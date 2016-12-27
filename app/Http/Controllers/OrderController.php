<?php

namespace App\Http\Controllers;

use Auth;
use App\Shirt;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
        $this->middleware('order.owner')->only('show');

        $this->middleware('shop.manager')->only('edit', 'update');
    }

    public function index() //authenticated user, shop manager, admin
    {
    	$orders = Order::UserSubmittedOrders();

    	return view('order.index', compact('orders'));
    }

    public function show($id) //order-owner, shop manager, admin
    {
        $order = Order::findOrFail($id);

        return view('order.show', compact('order'));
    }

    public function addItem(Request $request) //authenticated user
    {
        $size = $request->size;

        $shirt = $request->shirt_id;

        $quantity = $request->quantity;
        
        if(!$this->quantityEnough($quantity, $shirt, $size) == true)
        {
            return 'Sorry, the stock seems to be not enough';
        }
        
        $order = Auth::user()->orders()->firstOrCreate(['submitted' => 0]);

        $shirtExists = $order->shirts()->where('id', $shirt)->where('attribute', $size)->first();

        if(!$shirtExists)
        {
            $order->shirts()->attach($request->shirt_id, ['quantity' => $quantity, 'attribute' => $size ]);

            return 'New shirt created';
        }
        
        if($shirtExists)
        {
            $newQuantity = $this->addQuantity($order->id, $shirt, $quantity, $size);

            $shirtExists->pivot->update(['quantity' => $newQuantity]);
        }

        $this->deductStock($shirt, $size, $quantity);

        return 'Shirt quantity updated';
    }

    public function quantityEnough($quantityRequested, $shirt_id, $size)
    {
        if($quantityRequested > Shirt::findOrFail($shirt_id)->$size)
        {
            return false;
        }

        return true;
    }

    public function addQuantity($orderId, $shirtId, $quantity, $size)
    {
        $shirt = Order::find($orderId)->shirts()->where('id', $shirtId)->where('attribute', $size)->first();

        $shirtQuantity = $shirt->pivot->quantity + $quantity;

        return $shirtQuantity;
    }

    public function deductStock($shirtId, $size, $quantity)
    {
        $shirt = Shirt::find($shirtId);

        $newQuantity = $shirt->$size - $quantity;

        $shirt->$size = $newQuantity;

        $shirt->update();
    }

    public function shirtQuantity($id, $size)
    {
        $quantity = Shirt::findOrFail($id)->$size;

        return $quantity;
    }

    public function create() //authenticated user
    {
        $order = Order::CurrentOrder();

        if($order->exists() == false) {
            return redirect('shirt');
        }

        return view('order.create', compact('order'));
    }

    public function submit(Request $request) //authenticated user
    {
        $order = Order::currentOrder();

        $order->submitted = 1;

        $order->update($request->all());

        return redirect('order');
    }

    public function uploadPayment(Request $request)
    {
        $file = request()->file('payment');

        $path = $file->store('public/payments/' . auth()->id());

        $order = Order::findOrFail($request->id);

        $order->payment_references = $path;

        $order->update();
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return view('order.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->update($request->all());

        return redirect()->back();
    }
}
