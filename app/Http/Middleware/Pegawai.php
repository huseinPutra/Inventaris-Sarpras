<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Pegawai
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
         if (!auth()->guard('pegawai')->check()) {
            return redirect('/login');
        }

        if (isset(auth()->user()->id_level)) {
            return abort(404);
        }

        return $next($request);
    }
}
