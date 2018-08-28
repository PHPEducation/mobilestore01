<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Register
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
        if(!Auth::check()) {
            return false;
        } else {
            $user = Auth::user();
            if( !$user->role->name == 'Manager') {
                return false;
            }
        }

        return $next($request);
    }
}
