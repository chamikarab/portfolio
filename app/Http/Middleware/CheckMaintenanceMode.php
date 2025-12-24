<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;

class CheckMaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if custom maintenance mode is enabled
        $maintenanceFile = storage_path('framework/custom_maintenance.json');
        $isMaintenanceMode = File::exists($maintenanceFile);

        if ($isMaintenanceMode) {
            // Allow admin login routes (both GET and POST) - check multiple ways for reliability
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

            // Return 503 Service Unavailable for all other routes
            return response('Service temporarily unavailable. Please try again later.', 503)
                ->header('Retry-After', '60');
        }

        return $next($request);
    }
}
