<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        // redirect to user page if user is not administrator
        if (Auth::check()) {
            if (Auth::user()->role_id !== 1 ) {
                return redirect('/home');
            }
        }else{
            return redirect('/login');
        }
        return $next($request);
    }
}
