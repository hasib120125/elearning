<?php

namespace App\Http\Middleware;

use Closure;

class CheckDefaultPassword
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if (auth()->user()->is_default_password && 1 != auth()->user()->source) {
            
            return redirect('users/change-password');
        }

        return $next($request);
    }
}
