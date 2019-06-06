<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
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
        $auth = DB::table('users')
            ->where('id', Auth::id())
            ->pluck('role');

        if( $auth[0] != 'admin:1') {
            return redirect('dashboard');
        }

        return $next($request);
    }
}
