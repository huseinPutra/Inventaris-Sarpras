<?php

namespace App\Http\Middleware;

use Closure;
use auth;

class Admin
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
        if(!auth::guard('web')->check()){
            return redirect()->route('login');
        }

        if(isset(auth::user()->id_level)){
            if(auth()->user()->id_level == 2){
                return abort(404);
            }elseif(auth::guard('pegawai')->check()){
                return abort(404);
            }
        }
        return $next($request);
    }
}
