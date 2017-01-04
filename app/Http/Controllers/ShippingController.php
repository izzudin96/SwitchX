<?php

namespace App\Http\Controllers;

use App\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function __construct()
    {
        $this->middleware('shop.manager');
    }

    public function index()
    {
        $shippings = Shipping::all();

        return view('shipping.index', compact('shippings'));
    }

    public function store(Request $request)
    {
        Shipping::create($request->all());

        return redirect()->back()
            ->with('message', 'Shipping box created')
            ->with('messageType', 'success');
    }

    public function destroy(Request $request)
    {
        Shipping::destroy($request->id);

        return redirect()->back()
            ->with('message', 'Shipping box deleted')
            ->with('messageType', 'success');
    }
}
