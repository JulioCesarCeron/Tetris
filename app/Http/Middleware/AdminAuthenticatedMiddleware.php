<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminAuthenticatedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if(Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }

        if(Auth::check() && Auth::user()->isProfessor()) {
            return redirect('/professor');
        }

        return redirect('/login');
    }
}
