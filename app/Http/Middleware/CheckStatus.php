<?php

namespace BrainApp\Http\Middleware;

use Closure;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$status)
    {   
        
        if (! $request->user()->hasStatus($status)) {
            return redirect('/home');
        }

        return $next($request);
    }
}