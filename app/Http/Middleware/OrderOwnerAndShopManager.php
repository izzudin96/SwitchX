<?php

namespace App\Http\Middleware;

use Auth;
use App\Order;
use Closure;

class OrderOwnerAndShopManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->id == Order::find($request->id)->user_id)
        {
            return $next($request);
        }

        if(Auth::user()->role > 1)
        {
            return $next($request);
        }

        return redirect('/');
    }
}
