<?php

namespace App\Http\Controllers;

use App\Dashboard;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dashboard = Dashboard::first();
        
        return view('pages.home.main', compact('dashboard'));
    }
}
