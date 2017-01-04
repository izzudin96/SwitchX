<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
	public function __construct()
	{
        $this->middleware('shop.manager')->except('index', 'show');
	}

    public function index()
    {
    	$products = Product::Latest();

    	return view('product.index', compact('products'));
    }

    public function create()
    {
    	return view('product.create');
    }

    public function store(ProductRequest $request) //admin
    {
 		$product = Product::create($request->all());

 		return redirect('/product')
            ->with('message', 'Product added')
            ->with('messageType', 'success');
    }

    public function show($name) //guest
    {
    	$product = Product::name($name)->first();

    	return view('product.show', compact('product')); 
    }

    public function edit($name) //admin
    {
        $product = Product::name($name)->first();

        return view('product.edit', compact('product'));
    }

    public function update(ProductRequest $request) //admin
    {
        $product = Product::name($request->name)->first();

        $product->update($request->all());

        return redirect('product')
            ->with('message', 'Product updated.')
            ->with('messageType', 'success');
    }

    public function destroy($name) //admin
    {
        $product = Product::name($name);

        $product->delete();

        return redirect()->back()
            ->with('message', 'Product deleted.')
            ->with('messageType', 'success');
    }
}
