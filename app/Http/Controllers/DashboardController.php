<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        return $this->middleware('shop.manager');
    }

    public function index()
    {
        return view('dashboard.index');
    }

    public function general()
    {
        return view('dashboard.general');
    }

    public function payment()
    {
        return view('dashboard.payment');
    }

    public function homepage()
    {
        return view('dashboard.homepage');
    }

    public function product()
    {  
        $products = Product::paginate(20);
        
        return view('dashboard.product', compact('products'));
    }

    public function order()
    {
        $orders = Order::paginate(20);

        return view('dashboard.order', compact('orders'));
    }

    public function user()
    {
        $users = User::paginate(15);

        return view('dashboard.user', compact('users'));
    }

    public function analytics()
    {
        return view('dashboard.analytics');
    }
}
