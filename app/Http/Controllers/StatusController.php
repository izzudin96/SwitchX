<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function store(Request $request)
    {
        Status::create($request->all());

        return redirect()->back()->with('message', 'New status created')->with('messageType', 'success');
    }

    public function destroy($id)
    {
        Status::destroy($id);

        return redirect()->back()->with('message', 'Status deleted')->with('messageType', 'danger');
    }
}
