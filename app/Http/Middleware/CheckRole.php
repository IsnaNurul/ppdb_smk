<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return \Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the user has the required role
            if ($role == 'admin' && $user->level == 'admin' || $user->level == 'operator') {
                return $next($request);
            }

            if ($role == 'siswa' && $user->level == 'siswa') {
                return $next($request);
            }
        }

        // Redirect to login if the user is not authenticated or does not have the correct role
        if ($role == 'admin') {
            return redirect()->route('login.admin'); // Redirect to admin login
        }

        return redirect()->route('login.siswa'); // Redirect to siswa login
    }
}
