<?php

namespace App\Http\Controllers;

use App\Shirt;
use Illuminate\Http\Request;
use App\Http\Requests\ShirtRequest;

class ShirtController extends Controller
{
	public function __construct()
	{
        $this->middleware('shop.manager')->except('index', 'show');
	}

    public function index()
    {
    	$shirts = Shirt::all();

    	return view('shirt.index', compact('shirts'));
    }

    public function create()
    {
    	return view('shirt.create');
    }

    public function store(ShirtRequest $request) //admin
    {
 		$shirt = Shirt::create($request->all());

 		return redirect('/shirt');
    }

    public function show($name) //guest
    {
    	$shirt = Shirt::name($name)->first();

    	return view('shirt.show', compact('shirt')); 
    }

    public function edit($name) //admin
    {
        $shirt = Shirt::name($name)->first();

        return view('shirt.edit', compact('shirt'));
    }

    public function update(ShirtRequest $request) //admin
    {
        $shirt = Shirt::name($request->name)->first();

        $shirt->update($request->all());

        return redirect('shirt/'. $shirt->uri($request->name));
    }

    public function destroy($name) //admin
    {
        $shirt = Shirt::name($name);

        $shirt->delete();

        return redirect('shirt');
    }
}
