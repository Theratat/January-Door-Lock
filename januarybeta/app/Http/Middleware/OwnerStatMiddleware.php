<?php

namespace App\Http\Middleware;

use Closure;

class OwnerStatMiddleware
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
        if(auth()->user()->owner_status == 0){
            return response()->json(['status' => 'Owner role required']);
        }

        return $next($request);
    }
}
