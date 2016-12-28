<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
    public function store(Request $request)
    {
        $file = request()->file('payment');

        $path = $file->store('public/payments/' . auth()->id());

        $order = Order::findOrFail($request->id);

        $order->payment_references = $path;

        $order->update();

        return redirect()->back()
                ->with('message', 'Payment Reference uploaded.')
                ->with('messageType', 'success');
    }
}
