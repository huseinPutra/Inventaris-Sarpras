<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard('web')->check()) {
            if(Auth::user()->id_level == 1){
                return redirect()->route('home');
            }elseif(Auth::user()->id_level == 2){
                return redirect()->route('Operator.home');
            }
        }

        if (Auth::guard('pegawai')->check()) {
           return redirect()->route('Pegawai.index');
        }

        return $next($request);
    }
}
