<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\Helpers\SessionCheck;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role = null)
    {
        if (SessionCheck::checkLogin($request, $role) == 401)
            return redirect()->route('view.login',$role);
        return $next($request);
    }
}
