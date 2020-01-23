<?php

namespace App\Http\Middleware;

use Closure;

class Operator
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
       if (!auth()->guard('web')->check()) {
            return redirect('/login');
        }

        if (isset(auth()->user()->id_level)) {
            if (auth()->user()->id_level == 1) {
                return abort(404);
            }
        }

        if (isset(auth()->guard('pegawai')->user()->nama_pegawai)) {
            return abort(404);
        }


        return $next($request);
    }
}
