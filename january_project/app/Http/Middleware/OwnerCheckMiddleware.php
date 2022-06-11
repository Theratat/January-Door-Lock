<?php

namespace App\Http\Middleware;

use Closure;

class OwnerCheckMiddleware
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
        $response = $next($request);
        if(session('owner_stat') == 0){
            return redirect()->route('bridge');
        }
        return $response;
    }
}
