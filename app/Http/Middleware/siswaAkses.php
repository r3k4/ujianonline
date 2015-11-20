<?php

namespace App\Http\Middleware;

use Closure;

class siswaAkses
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
        if(\Auth::user()->ref_user_level_id != 3 ){
            return response('akses ditolak', 401);
        }                
        return $next($request);
    }
}
