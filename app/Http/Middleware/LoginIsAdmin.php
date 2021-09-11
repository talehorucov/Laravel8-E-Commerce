<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginIsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->type!='Admin') {
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
