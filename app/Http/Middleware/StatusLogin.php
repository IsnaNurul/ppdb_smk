<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StatusLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        // Check if the user is authenticated with 'pengelola' guard
        if (Auth::guard('pengelola')->check()) {
            return $next($request); // Continue to the requested page
        }

        // Redirect to the respective login page based on the guard
        if ($request->is('/pages/admin/*')) {
            return redirect()->route('login.admin'); // Redirect to admin login
        }
        
        // Check if the user is authenticated with 'web' guard
        if (Auth::check()) {
            return $next($request); // Continue to the requested page
        }


        return redirect()->route('login'); // Redirect to user login
    }
}
