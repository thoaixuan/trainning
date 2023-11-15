<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Http\Request;

class checkAuth
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
            if(Auth::check()){
                if(Auth::user()){
                    switch(Auth::user()->type){
                        case 'AdminSystem':
                            return $next($request);
                            break;
                        case 'Admin':
                            return $next($request);
                            break;
                        default:
                            return redirect()->route('admin.dashboard');
                            break;
                    }
                }
                else{
                    return redirect()->route('admin.error.404');
                }
            }
            abort(403);
    }
}
