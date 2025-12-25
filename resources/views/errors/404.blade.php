@extends('layouts.app')

@section('title', '404 - Page Not Found')

@section('content')
<section class="min-h-screen flex items-center justify-center pt-20 pb-12 px-4 relative overflow-hidden">
    <!-- Subtle animated background -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-72 h-72 bg-purple-500/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-72 h-72 bg-pink-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1.5s;"></div>
    </div>

    <div class="container mx-auto max-w-3xl relative z-10">
        <div class="text-center">
            <!-- Creative 404 Display -->
            <div class="mb-10 fade-in-up">
                <div class="flex items-center justify-center gap-3 mb-6">
                    <span class="text-7xl sm:text-9xl font-bold gradient-text">4</span>
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full blur-2xl opacity-40 animate-pulse"></div>
                        <div class="relative w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-gradient-to-br from-purple-500 via-pink-500 to-indigo-500 flex items-center justify-center shadow-lg">
                            <i class="fas fa-search text-2xl sm:text-3xl text-white"></i>
                        </div>
                    </div>
                    <span class="text-7xl sm:text-9xl font-bold gradient-text">4</span>
                </div>
            </div>

            <!-- Error Message -->
            <div class="mb-8 fade-in-up" style="animation-delay: 0.2s;">
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-4">
                    <span class="gradient-text">Page Not Found</span>
                </h1>
                <p class="text-lg sm:text-xl text-slate-300 max-w-xl mx-auto">
                    Looks like this page got lost in the code. 
                    <span class="text-slate-400">Let's get you back on track!</span>
                </p>
            </div>

            <!-- Creative Code Block -->
            <div class="mb-10 fade-in-up" style="animation-delay: 0.4s;">
                <div class="glass rounded-2xl p-6 sm:p-8 text-left max-w-xl mx-auto border border-white/10">
                    <div class="flex items-center gap-2 mb-4 pb-3 border-b border-white/10">
                        <span class="h-2.5 w-2.5 rounded-full bg-red-500"></span>
                        <span class="h-2.5 w-2.5 rounded-full bg-yellow-500"></span>
                        <span class="h-2.5 w-2.5 rounded-full bg-green-500"></span>
                        <span class="ml-auto text-xs text-slate-400 font-mono">404.js</span>
                    </div>
                    <div class="font-mono text-sm sm:text-base space-y-2">
                        <div class="text-slate-400">
                            <span class="text-purple-400">console</span>
                            <span class="text-white">.</span>
                            <span class="text-blue-400">error</span>
                            <span class="text-white">(</span>
                            <span class="text-green-400">'Page not found'</span>
                            <span class="text-white">);</span>
                        </div>
                        <div class="text-slate-500 text-xs">
                            <span class="text-slate-500">//</span> 
                            <span class="ml-2">Status: 404 | Route: {{ request()->path() }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center fade-in-up" style="animation-delay: 0.6s;">
                <a href="{{ route('home') }}" class="btn-primary inline-flex items-center gap-2 px-8 py-4">
                    <i class="fas fa-home"></i>
                    <span>Go Home</span>
                </a>
                <a href="{{ route('projects.index') }}" class="btn-secondary inline-flex items-center gap-2 px-8 py-4">
                    <i class="fas fa-code"></i>
                    <span>View Projects</span>
                </a>
            </div>

            <!-- Fun Developer Message -->
            <div class="mt-12 fade-in-up" style="animation-delay: 0.8s;">
                <div class="glass rounded-xl p-4 max-w-md mx-auto border border-white/10">
                    <p class="text-sm text-slate-400">
                        <i class="fas fa-lightbulb text-yellow-400 mr-2"></i>
                        <span>Pro tip: Check the URL or navigate using the menu above.</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .fade-in-up {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s ease-out forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

@endsection
