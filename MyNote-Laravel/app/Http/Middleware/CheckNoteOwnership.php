<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckNoteOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $note = Note::findOrFail( $request->id);

        if ($note->owner !== auth()->id() && auth() -> id() !== 1) {
            return abort(403, 'Bạn không được phép sửa hoặc xóa note này.');
        }

        return $next($request);
    }

}
