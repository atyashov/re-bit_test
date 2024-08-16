<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ManagerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $whiteIPs = explode(";", env('MANAGER_WHITE_LIST'));
        if (Auth::check() && in_array($request->ip(), $whiteIPs)) {
            return $next($request);
        }
        abort('404');
    }
}
