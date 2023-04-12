<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\notes;

class CheckNoteOwnership
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
        $note = notes::findOrFail($request->id);

        if ($note->owner !== auth()->id() && auth() -> user()->per_id !== 1) {
            return abort(403, 'Bạn không được phép sửa hoặc xóa note này.');
        }

        return $next($request);
    }

}
