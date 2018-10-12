<?php

namespace App\Http\Middleware;

use Closure;

class checkUserSession
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
        if(!$request->session()->has('user'))
        {
            if(!$request->session()->has('admin'))
            {
                return redirect()->route('login');
            }
        }
        return $next($request);
    }
}
