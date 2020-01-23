<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class prosesbarangbaik
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
        if (Session::get('cannotbaik')) {
            return back();
        }

        return $next($request);
    }
}
