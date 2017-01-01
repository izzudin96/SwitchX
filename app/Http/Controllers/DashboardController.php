<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Status;
use App\Product;
use App\Dashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('shop.manager');
    }

    public function index()
    {
        return view('dashboard.index');
    }

    public function update(Request $request)
    {
        $dashboard = Dashboard::first();

        $dashboard->update($request->all());

        return redirect()->back()->with('message', 'Updated.')->with('messageType', 'success');
    }

    public function general()
    {
        $dashboard = Dashboard::first();

        return view('dashboard.general', compact('dashboard'));
    }

    public function payment()
    {
        $dashboard = Dashboard::first();

        return view('dashboard.payment', compact('dashboard'));
    }

    public function homepage()
    {
        $dashboard = Dashboard::first();

        return view('dashboard.homepage', compact('dashboard'));
    }

    public function product()
    {  
        $products = Product::paginate(20);
        
        return view('dashboard.product', compact('products'));
    }

    public function order()
    {
        $orders = Order::paginate(20);
        $statuses = Status::all();

        return view('dashboard.order', compact('orders', 'statuses'));
    }

    public function user()
    {
        $users = User::paginate(15);

        return view('dashboard.user', compact('users'));
    }

    public function analytics()
    {
        $dashboard = Dashboard::first();
        return view('dashboard.analytics', compact('dashboard'));
    }
}
