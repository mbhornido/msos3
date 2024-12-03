<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Super
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user->usertype === 'super') {
            return $next($request); // Allow superadmin to proceed
        }

        // Redirect based on user role
        if ($user->usertype === 'student') {
            return redirect('/dashboard');
        } elseif ($user->usertype === 'admin') {
            return redirect('summary');
        }

        // Default redirect in case the role doesn't match
        return redirect('/');
    }
}
