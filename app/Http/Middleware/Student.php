<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Student
{ 
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user->usertype === 'student') {
            return $next($request); // Allow superadmin to proceed
        }

        // Redirect based on user role
        if ($user->usertype === 'super') {
            return redirect('super_dashboard');
        } elseif ($user->usertype === 'admin') {
            return redirect('summary');
        }

        // Default redirect in case the role doesn't match
        return redirect('/');
    }
}
