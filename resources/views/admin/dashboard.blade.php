@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

@php
    $projectsCount = $projectsCount ?? \App\Models\Project::count();
    $testimonialsCount = $testimonialsCount ?? \App\Models\Testimonial::count();
    $recentProjects = ($recentProjects ?? null) ?: \App\Models\Project::latest()->take(4)->get();
    $recentTestimonials = ($recentTestimonials ?? null) ?: \App\Models\Testimonial::latest()->take(4)->get();
@endphp

@if(session('success'))
    <div class="p-4 mb-8 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex items-center gap-3">
        <i class="fa-solid fa-circle-check text-lg"></i>
        <p class="text-sm font-medium">{{ session('success') }}</p>
    </div>
@endif

<header class="admin-header">
    <div>
        <h1 class="admin-page-title">Dashboard</h1>
        <p class="text-gray-500 text-sm mt-1">Welcome back, {{ explode(' ', auth()->user()->name)[0] }}</p>
    </div>
    <div class="flex items-center gap-3">
        <a href="{{ route('admin.projects.create') }}" class="btn-modern-primary">
            <i class="fa-solid fa-plus text-xs"></i>
            New Project
        </a>
        <a href="{{ route('admin.testimonials.create') }}" class="btn-modern-secondary">
            Add Testimonial
        </a>
    </div>
</header>

<!-- Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="admin-card p-6">
        <div class="flex items-center justify-between mb-4">
            <span class="text-gray-500 text-xs font-bold uppercase tracking-widest">Active Assets</span>
            <div class="w-10 h-10 rounded-xl bg-indigo-500/10 flex items-center justify-center text-indigo-400">
                <i class="fa-solid fa-folder-tree"></i>
            </div>
        </div>
        <p class="text-3xl font-bold text-white">{{ $projectsCount }}</p>
        <p class="text-[11px] text-gray-600 mt-2 font-medium uppercase tracking-wider">Total Portfolio Projects</p>
    </div>

    <div class="admin-card p-6">
        <div class="flex items-center justify-between mb-4">
            <span class="text-gray-500 text-xs font-bold uppercase tracking-widest">Social Signals</span>
            <div class="w-10 h-10 rounded-xl bg-emerald-500/10 flex items-center justify-center text-emerald-400">
                <i class="fa-solid fa-comment-dots"></i>
            </div>
        </div>
        <p class="text-3xl font-bold text-white">{{ $testimonialsCount }}</p>
        <p class="text-[11px] text-gray-600 mt-2 font-medium uppercase tracking-wider">Verified Testimonials</p>
    </div>

    <div class="admin-card p-6 overflow-hidden relative">
        <div class="flex items-center justify-between mb-4">
            <span class="text-gray-500 text-xs font-bold uppercase tracking-widest">Health Index</span>
            <div class="w-10 h-10 rounded-xl bg-purple-500/10 flex items-center justify-center text-purple-400">
                <i class="fa-solid fa-bolt-lightning"></i>
            </div>
        </div>
        <p class="text-3xl font-bold text-white">{{ round(min(100, ($projectsCount/10)*100)) }}%</p>
        <div class="mt-4 h-1.5 w-full bg-white/5 rounded-full overflow-hidden">
            @php $saturation = min(100, ($projectsCount/10)*100); @endphp
            <div class="h-full bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full" style="width: {{ $saturation }}%"></div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
    <!-- Recent Projects -->
    <div class="space-y-4">
        <div class="flex items-center justify-between px-2">
            <h3 class="text-xs font-bold text-gray-500 uppercase tracking-widest">Recent Activity</h3>
            <a href="{{ route('admin.all-projects') }}" class="text-[10px] font-bold text-indigo-400 hover:text-white transition">Full Registry</a>
        </div>
        <div class="admin-card overflow-hidden">
            <div class="divide-y divide-white/5">
                @forelse($recentProjects as $project)
                    <div class="p-4 flex items-center justify-between group hover:bg-white/[0.02] transition-colors">
                        <div class="flex items-center gap-4 min-w-0">
                            <div class="w-12 h-12 rounded-xl bg-white/5 overflow-hidden border border-white/5 flex-shrink-0">
                                @if($project->image)
                                    <img src="{{ $project->image_url }}" class="w-full h-full object-cover opacity-60 group-hover:opacity-100 transition duration-500"
                                         onerror="this.onerror=null; this.src='{{ asset('assets/placeholder.svg') }}';">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-700">
                                        <i class="fa-solid fa-image"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="min-w-0">
                                <p class="text-sm font-semibold text-white truncate">{{ $project->name }}</p>
                                <p class="text-[10px] text-gray-500 font-bold uppercase tracking-widest mt-0.5">{{ $project->category }}</p>
                            </div>
                        </div>
                        <a href="{{ route('admin.projects.edit', $project) }}" class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-gray-500 hover:text-white transition">
                            <i class="fa-solid fa-pen-to-square text-xs"></i>
                        </a>
                    </div>
                @empty
                    <div class="p-12 text-center">
                        <p class="text-xs text-gray-600 font-medium">No recent operations detected.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Quick Controls -->
    <div class="space-y-4">
        <div class="flex items-center justify-between px-2">
            <h3 class="text-xs font-bold text-gray-500 uppercase tracking-widest">System Protocols</h3>
        </div>
        <div class="grid grid-cols-1 gap-4">
            @php
                $maintenanceFile = storage_path('framework/custom_maintenance.json');
                $isMaintenance = \Illuminate\Support\Facades\File::exists($maintenanceFile);
                $comingSoonFile = storage_path('framework/custom_coming_soon.json');
                $isComingSoon = \Illuminate\Support\Facades\File::exists($comingSoonFile);
            @endphp
            
            <form action="{{ route('admin.toggle-maintenance') }}" method="POST">
                @csrf
                <button type="submit" class="w-full admin-card p-5 flex items-center justify-between hover:border-amber-500/30 transition group">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl {{ $isMaintenance ? 'bg-amber-500/20 text-amber-500' : 'bg-white/5 text-gray-600' }} flex items-center justify-center transition border border-white/5">
                            <i class="fa-solid fa-wrench text-sm"></i>
                        </div>
                        <span class="text-sm font-semibold {{ $isMaintenance ? 'text-white' : 'text-gray-400' }}">Maintenance Mode</span>
                    </div>
                    <div class="w-10 h-5 rounded-full bg-black/40 border border-white/10 relative flex items-center px-1 transition">
                        <div class="w-3 h-3 rounded-full {{ $isMaintenance ? 'translate-x-5 bg-amber-500' : 'bg-gray-800' }} transition-all duration-300"></div>
                    </div>
                </button>
            </form>

            <form action="{{ route('admin.toggle-coming-soon') }}" method="POST">
                @csrf
                <button type="submit" class="w-full admin-card p-5 flex items-center justify-between hover:border-purple-500/30 transition group">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl {{ $isComingSoon ? 'bg-purple-500/20 text-purple-500' : 'bg-white/5 text-gray-600' }} flex items-center justify-center transition border border-white/5">
                            <i class="fa-solid fa-rocket text-sm"></i>
                        </div>
                        <span class="text-sm font-semibold {{ $isComingSoon ? 'text-white' : 'text-gray-400' }}">Coming Soon Page</span>
                    </div>
                    <div class="w-10 h-5 rounded-full bg-black/40 border border-white/10 relative flex items-center px-1 transition">
                        <div class="w-3 h-3 rounded-full {{ $isComingSoon ? 'translate-x-5 bg-purple-500' : 'bg-gray-800' }} transition-all duration-300"></div>
                    </div>
                </button>
            </form>

            <div class="admin-card p-6 bg-indigo-500/[0.02] border-indigo-500/10">
                <div class="flex items-center gap-3 mb-3">
                    <i class="fa-solid fa-lightbulb text-indigo-400"></i>
                    <h4 class="text-xs font-bold text-white uppercase tracking-widest">Operational Tip</h4>
                </div>
                <p class="text-gray-500 text-[11px] leading-relaxed">
                    System health is currently optimal. Maintain portfolio engagement by updating your latest assets once every 14 days.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
