<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = Auth::user();
        
        // Ensure that the user is authenticated and has the specified role
        if (! $user || $user->role->name !== $role) {
            if ($user) {
                if ($user->role->name === 'admin') {
                    return redirect()->route('admin.dashboard');
                } elseif ($user->role->name === 'instructor') {
                    return redirect()->route('instructor.dashboard');
                } elseif ($user->role->name === 'student') {
                    return redirect()->route('student.dashboard');
                }
            }

            // If user is not authenticated, redirect to login
            return redirect()->route('login');
        }

        return $next($request);
    }
}
