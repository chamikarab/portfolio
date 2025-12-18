@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

@php
    $projectsCount = $projectsCount ?? \App\Models\Project::count();
    $testimonialsCount = $testimonialsCount ?? \App\Models\Testimonial::count();
    $recentProjects = ($recentProjects ?? null) ?: \App\Models\Project::latest()->take(5)->get();
    $recentTestimonials = ($recentTestimonials ?? null) ?: \App\Models\Testimonial::latest()->take(5)->get();
@endphp

{{-- Top hero / welcome --}}
<div class="admin-card mb-5">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <div>
            <p class="text-xs font-medium uppercase tracking-[0.18em] text-slate-500 mb-1">Overview</p>
            <h2 class="text-xl md:text-2xl font-semibold tracking-tight text-slate-900">
                Welcome back, {{ auth()->user()->name ?? 'Admin' }}
            </h2>
            <p class="mt-1 text-xs md:text-sm text-slate-600 max-w-xl">
                Quickly see how your portfolio content is performing and jump into the tasks that matter most.
            </p>
        </div>
        <div class="flex flex-wrap gap-2 text-sm">
            <a href="{{ route('admin.projects.create') }}" class="admin-btn-primary">
                <i class="fa-solid fa-circle-plus text-[11px]"></i>
                <span>New project</span>
            </a>
            <a href="{{ route('admin.testimonials.create') }}" class="admin-btn-ghost">
                <i class="fa-solid fa-quote-left text-[11px]"></i>
                <span>New testimonial</span>
            </a>
            <a href="{{ route('home') }}" class="admin-btn-ghost">
                <i class="fa-solid fa-globe text-[11px]"></i>
                <span>View site</span>
            </a>
        </div>
    </div>
</div>

{{-- KPI cards --}}
<div class="grid gap-4 md:grid-cols-3 mb-6">
    {{-- Projects --}}
    <div class="admin-card">
        <div class="admin-card-header">
            <div>
                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Projects</p>
                <p class="mt-1 text-3xl font-semibold text-slate-900">
                    {{ $projectsCount }}
                </p>
            </div>
            <span class="admin-badge-pill">
                <i class="fa-solid fa-briefcase text-xs mr-1"></i>
                Portfolio
            </span>
        </div>
        <p class="text-xs text-slate-600">
            All projects currently visible on your public portfolio.
        </p>
        <div class="mt-4 flex items-center justify-between text-[11px]">
            <a href="{{ route('admin.all-projects') }}" class="inline-flex items-center gap-1 text-indigo-600 hover:text-indigo-500 font-medium">
                <span>Manage projects</span>
                <i class="fa-solid fa-arrow-up-right-from-square text-[9px]"></i>
            </a>
            <a href="{{ route('admin.projects.create') }}" class="admin-btn-ghost px-3 py-1">
                <i class="fa-solid fa-circle-plus text-[10px] mr-1"></i>
                <span>New project</span>
            </a>
        </div>
    </div>

    {{-- Testimonials --}}
    <div class="admin-card">
        <div class="admin-card-header">
            <div>
                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Testimonials</p>
                <p class="mt-1 text-3xl font-semibold text-slate-900">
                    {{ $testimonialsCount }}
                </p>
            </div>
            <span class="admin-badge-pill">
                <i class="fa-solid fa-comment-dots text-xs mr-1"></i>
                Social proof
            </span>
        </div>
        <p class="text-xs text-slate-600">
            Client quotes that add credibility to your work.
        </p>
        <div class="mt-4 flex items-center justify-between text-[11px]">
            <a href="{{ route('admin.all-testimonials') }}" class="inline-flex items-center gap-1 text-indigo-600 hover:text-indigo-500 font-medium">
                <span>View all testimonials</span>
                <i class="fa-solid fa-arrow-up-right-from-square text-[9px]"></i>
            </a>
            <a href="{{ route('admin.testimonials.create') }}" class="admin-btn-ghost px-3 py-1">
                <i class="fa-solid fa-square-plus text-[10px] mr-1"></i>
                <span>New testimonial</span>
            </a>
        </div>
    </div>

    {{-- Activity snapshot --}}
    <div class="admin-card">
        <div class="admin-card-header">
            <div>
                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Today</p>
                <p class="mt-1 text-sm font-semibold text-slate-900">Activity snapshot</p>
            </div>
        </div>
        <ul class="mt-1 space-y-1.5 text-xs text-slate-600">
            <li class="flex items-center gap-2">
                <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                <span><strong class="font-semibold text-slate-900">{{ $projectsCount }}</strong> total projects in your portfolio.</span>
            </li>
            <li class="flex items-center gap-2">
                <span class="h-1.5 w-1.5 rounded-full bg-sky-400"></span>
                <span><strong class="font-semibold text-slate-900">{{ $testimonialsCount }}</strong> testimonials from clients.</span>
            </li>
            <li class="flex items-center gap-2">
                <span class="h-1.5 w-1.5 rounded-full bg-indigo-400"></span>
                <span>Keep things fresh by adding new content regularly.</span>
            </li>
        </ul>
        <div class="mt-4 flex items-center justify-between text-[11px] text-slate-500">
            <span>Tip: aim to add at least one new project each month.</span>
        </div>
    </div>
</div>

{{-- Main grid: recent activity + highlights --}}
<div class="grid gap-4 lg:grid-cols-[minmax(0,2.1fr)_minmax(0,1.4fr)]">
    {{-- Recent activity --}}
    <div class="space-y-4">
        <div class="admin-card">
            <div class="admin-card-header">
                <div>
                    <h2 class="admin-card-title">Recent activity</h2>
                    <p class="text-xs text-slate-600 mt-0.5">Latest changes to your portfolio content.</p>
                </div>
            </div>

            <div class="space-y-3 text-sm text-slate-700">
                @if($recentProjects->isEmpty() && $recentTestimonials->isEmpty())
                    <p class="text-xs text-slate-500">
                        No activity yet. Create your first project or testimonial to see activity here.
                    </p>
                @endif

                @foreach($recentProjects as $project)
                    <div class="flex items-start gap-3 rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5">
                        <div class="mt-0.5">
                            <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-indigo-500 text-[11px] text-white shadow-sm">
                                <i class="fa-solid fa-briefcase"></i>
                            </span>
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="truncate text-sm font-medium text-slate-900">
                                New project: {{ $project->name }}
                            </p>
                            <p class="text-xs text-slate-500 truncate">
                                {{ $project->category ?? 'Uncategorized' }}
                            </p>
                        </div>
                        <p class="whitespace-nowrap text-[11px] text-slate-500">
                            {{ $project->created_at?->diffForHumans() }}
                        </p>
                    </div>
                @endforeach

                @foreach($recentTestimonials as $testimonial)
                    <div class="flex items-start gap-3 rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5">
                        <div class="mt-0.5">
                            <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-emerald-500 text-[11px] text-white shadow-sm">
                                <i class="fa-solid fa-quote-left"></i>
                            </span>
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="truncate text-sm font-medium text-slate-900">
                                New testimonial from {{ $testimonial->client_name }}
                            </p>
                            <p class="mt-0.5 text-xs text-slate-600 line-clamp-2">
                                “{{ $testimonial->testimonial }}”
                            </p>
                        </div>
                        <p class="whitespace-nowrap text-[11px] text-slate-500">
                            {{ $testimonial->created_at?->diffForHumans() }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Right column: quick insights --}}
    <div class="space-y-4">
        {{-- Quick actions --}}
        <div class="admin-card">
            <div class="admin-card-header">
                <h2 class="admin-card-title">Quick actions</h2>
            </div>
            <ul class="mt-1 space-y-2 text-sm text-slate-700">
                <li>
                    <a href="{{ route('admin.projects.create') }}" class="flex items-center justify-between gap-3 rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 hover:border-indigo-500/60 hover:bg-indigo-50 transition">
                        <div class="flex items-center gap-2">
                            <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-indigo-500 text-[11px] text-white">
                                <i class="fa-solid fa-circle-plus"></i>
                            </span>
                            <span>Add a featured project</span>
                        </div>
                        <i class="fa-solid fa-chevron-right text-[10px] text-slate-500"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.testimonials.create') }}" class="flex items-center justify-between gap-3 rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 hover:border-indigo-500/60 hover:bg-indigo-50 transition">
                        <div class="flex items-center gap-2">
                            <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-emerald-500 text-[11px] text-white">
                                <i class="fa-solid fa-quote-left"></i>
                            </span>
                            <span>Capture a new testimonial</span>
                        </div>
                        <i class="fa-solid fa-chevron-right text-[10px] text-slate-500"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}" class="flex items-center justify-between gap-3 rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 hover:border-indigo-500/60 hover:bg-indigo-50 transition">
                        <div class="flex items-center gap-2">
                            <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-sky-500 text-[11px] text-white">
                                <i class="fa-solid fa-globe"></i>
                            </span>
                            <span>Preview live portfolio</span>
                        </div>
                        <i class="fa-solid fa-chevron-right text-[10px] text-slate-500"></i>
                    </a>
                </li>
            </ul>
        </div>

        {{-- Content health --}}
        <div class="admin-card">
            <div class="admin-card-header">
                <h2 class="admin-card-title">Content health</h2>
            </div>
            <p class="text-xs text-slate-600 mb-3">
                A quick snapshot of how complete your portfolio feels.
            </p>
            <div class="space-y-3 text-xs text-slate-700">
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <span>Projects volume</span>
                        <span class="text-slate-500">{{ $projectsCount }} / 10+ recommended</span>
                    </div>
                    <div class="h-1.5 w-full rounded-full bg-slate-200 overflow-hidden">
                        @php
                            $projectProgress = min(100, ($projectsCount / 10) * 100);
                        @endphp
                        <div class="h-full rounded-full bg-indigo-500" style="width: {{ $projectProgress }}%;"></div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <span>Testimonials volume</span>
                        <span class="text-slate-500">{{ $testimonialsCount }} / 3+ recommended</span>
                    </div>
                    <div class="h-1.5 w-full rounded-full bg-slate-200 overflow-hidden">
                        @php
                            $testimonialProgress = min(100, ($testimonialsCount / 3) * 100);
                        @endphp
                        <div class="h-full rounded-full bg-emerald-500" style="width: {{ $testimonialProgress }}%;"></div>
                    </div>
                </div>
                <p class="pt-1 text-[11px] text-slate-500">
                    These are simple guidelines — focus on quality projects and honest testimonials.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
