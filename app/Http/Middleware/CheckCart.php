<?php

namespace Beone\Http\Middleware;

use Closure;

class CheckCart
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
        if(!$request->session()->get('cart')){
            return redirect()->route('welcome');
        }
        return $next($request);
    }
}
