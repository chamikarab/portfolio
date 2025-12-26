<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        // If already authenticated, redirect to dashboard
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function toggleMaintenance(Request $request)
    {
        $maintenanceFile = storage_path('framework/custom_maintenance.json');
        
        try {
            if (File::exists($maintenanceFile)) {
                // Turn off maintenance mode
                File::delete($maintenanceFile);
                return back()->with('success', 'Maintenance mode disabled. Site is now live!');
            } else {
                // Ensure directory exists
                $directory = dirname($maintenanceFile);
                if (!File::isDirectory($directory)) {
                    File::makeDirectory($directory, 0755, true);
                }
                
                // Turn on maintenance mode
                File::put($maintenanceFile, json_encode([
                    'enabled' => true,
                    'timestamp' => now()->toDateTimeString()
                ], JSON_PRETTY_PRINT));
                
                return back()->with('success', 'Maintenance mode enabled. Site is now under maintenance.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to toggle maintenance mode: ' . $e->getMessage());
        }
    }

    public function toggleComingSoon(Request $request)
    {
        $comingSoonFile = storage_path('framework/custom_coming_soon.json');
        
        try {
            if (File::exists($comingSoonFile)) {
                // Turn off coming soon mode
                File::delete($comingSoonFile);
                return back()->with('success', 'Coming soon mode disabled. Site is now live!');
            } else {
                // Ensure directory exists
                $directory = dirname($comingSoonFile);
                if (!File::isDirectory($directory)) {
                    File::makeDirectory($directory, 0755, true);
                }
                
                // Turn on coming soon mode
                File::put($comingSoonFile, json_encode([
                    'enabled' => true,
                    'timestamp' => now()->toDateTimeString()
                ], JSON_PRETTY_PRINT));
                
                return back()->with('success', 'Coming soon mode enabled. Site now shows coming soon page.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to toggle coming soon mode: ' . $e->getMessage());
        }
    }
}