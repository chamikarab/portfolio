<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;

class CheckComingSoonMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if custom coming soon mode is enabled
        $comingSoonFile = storage_path('framework/custom_coming_soon.json');
        $isComingSoonMode = File::exists($comingSoonFile);

        if ($isComingSoonMode) {
            // Allow coming soon page itself
            if ($request->is('coming-soon') || 
                $request->routeIs('coming-soon') || 
                $request->path() === 'coming-soon') {
                return $next($request);
            }

            // Allow admin login routes (both GET and POST)
            $isLoginRoute = 
                $request->is('admin/login') || 
                $request->is('login') || 
                $request->routeIs('admin.login') || 
                $request->routeIs('admin.login.post') || 
                $request->routeIs('login') ||
                $request->path() === 'admin/login' ||
                $request->path() === 'login';

            if ($isLoginRoute) {
                return $next($request);
            }

            // Allow all admin routes for authenticated users
            if ($request->is('admin*') && Auth::check()) {
                return $next($request);
            }

            // Redirect all other routes to coming soon page
            return redirect()->route('coming-soon');
        }

        return $next($request);
    }
}
