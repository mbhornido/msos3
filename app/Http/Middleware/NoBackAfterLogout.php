<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NoBackAfterLogout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        return $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0')
                        ->header('Pragma', 'no-cache')
                        ->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
    }
}
