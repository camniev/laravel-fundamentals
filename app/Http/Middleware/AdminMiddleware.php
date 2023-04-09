<?php

namespace App\Http\Middleware;

use Closure;

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

        // create a condition inside this function if the user is already authenticated
        // and if the user is an administrator
        if(auth()->guest()) {
            return redirect('/');
        }


        // create a condition to check if a user is admin or not
        if(auth()->user()->user_type == 0) {
            return redirect('/');
        } 

        return $next($request);
    }
}
