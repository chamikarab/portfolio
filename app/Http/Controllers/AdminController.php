<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (app()->isDownForMaintenance()) {
            // Turn off maintenance mode
            \Artisan::call('up');
            return back()->with('success', 'Maintenance mode disabled. Site is now live!');
        } else {
            // Turn on maintenance mode
            \Artisan::call('down', [
                '--render' => 'maintenance',
                '--retry' => 60
            ]);
            return back()->with('success', 'Maintenance mode enabled. Site is now under maintenance.');
        }
    }
}