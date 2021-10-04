<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // if (in_array($request->user()->level, $levels)) {
        //     return $next($request);
        // }
        // return redirect('/');

        if(Auth::guard('admin')->user()->level === 'perusahaan')
        {
            abort(404);
        }

        return $next($request);
    }
}