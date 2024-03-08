<?php

namespace App\Http\Middleware;
use App\Task;
use Auth;
use Closure;

class CheckPerTask
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
        $task =  Task::find($request->id);
        if ($task->userId !== Auth::user()->id) {
            return response()->json([
                'status'=>0,
                'message'=>"Bạn không có quyền sửa hoặc xóa task này",
            ]);
        }

        return $next($request);
    }
}
