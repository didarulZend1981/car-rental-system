<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // dd([$request->all(), $next]);
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }


        // if (Auth::check() && Auth::user()->role === 'admin') {
        //     return $next($request);
        // }
        return redirect('/')->with('error', 'Unauthorized access!');
    }
}

