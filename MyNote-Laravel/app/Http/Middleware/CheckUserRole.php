<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->per_id !== 1) {
            return redirect()->route('showLogin'); 
        }
        
        return $next($request);
    }
}
