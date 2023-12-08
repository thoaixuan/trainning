<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Closure;

class CheckPerUsers
{
    /**
     * Handle an incoming request.
     *
      * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->permission=="1"){
            return $next($request);
        }
        else{
            return redirect()->route('error.404');
        }
    }
}
