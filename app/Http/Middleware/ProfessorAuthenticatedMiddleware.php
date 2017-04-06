<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ProfessorAuthenticatedMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        if(Auth::check() && Auth::user()->isProfessor()) {
            return $next($request);
        }

        if(Auth::check() && Auth::user()->isAdmin()) {
            return redirect('/admin');
        }

        return redirect('/login');
    }
}
