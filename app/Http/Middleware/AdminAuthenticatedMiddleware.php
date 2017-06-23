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

        // ALLOW OPTIONS METHOD
          $headers = [
              'Access-Control-Allow-Origin' => '*',
                 'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',
                 'Access-Control-Allow-Headers'=> 'Content-Type, X-Auth-Token, Origin'
             ];
          if($request->getMethod() == "OPTIONS") {
                 // The client-side application can set only headers allowed in Access-Control-Allow-Headers
                 return Response::make('OK', 200, $headers);
             }

             $response = $next($request);
             foreach($headers as $key => $value) 
              $response->header($key, $value);

        if(Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }

        if(Auth::check() && Auth::user()->isProfessor()) {
            return redirect('/professor');
        }

        return redirect('/login');
    }
}
