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
            // Allow maintenance page itself
            if ($request->is('maintenance') || $request->routeIs('maintenance')) {
                return $next($request);
            }

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

            // Redirect all other routes to maintenance page
            return redirect()->route('maintenance');
        }

        return $next($request);
    }
}
