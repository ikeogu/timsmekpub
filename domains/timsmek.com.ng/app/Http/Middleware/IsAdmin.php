<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class IsAdmin
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
            if (Auth::user()->isAdmin == 1 || Auth::user()->isAdmin == 2) {
                return $next($request);
            }
        
    
            return redirect()->guest('/login');
        // return redirect('/login');
    }
}
