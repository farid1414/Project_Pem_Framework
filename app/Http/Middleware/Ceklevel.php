<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Ceklevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (in_array($request->admin()->level, $levels)) {
            return $next($request);
        }
        return redirect('/');
    }
}