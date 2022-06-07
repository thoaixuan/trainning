<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class checkPermission
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
        if($request->ajax()){
            if(Auth::check()){
                if(Auth::user()->type=="AdminSystem"){
                    return $next($request);
                }
                else{
                    return response()->json([
                        'status'=>0,
                        'message'=>'Mã pin bị sai'
                    ]); 
                }
            }else{
                return response()->json([
                    'status'=>0,
                    'message'=>'Mã pin bị sai'
                ]);
            }
        }
        else{
        if(Auth::check()){
            if(Auth::user()->type=="AdminSystem"){
                  return $next($request);
            }
            else{
                return redirect()->route('admin.error.404');
            }
        }else{
            return redirect()->route('admin.error.404');
        }
    }
    }
}
