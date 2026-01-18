@extends('layouts.admin')

@section('title', 'Project Registry')

@section('content')

<header class="admin-header">
    <div>
        <h1 class="admin-page-title">Project Registry</h1>
        <p class="text-gray-500 text-sm mt-1">Manage and organize your portfolio assets.</p>
    </div>
    <a href="{{ route('admin.projects.create') }}" class="btn-modern-primary">
        <i class="fa-solid fa-plus text-xs"></i>
        New Project
    </a>
</header>

@if(session('success'))
    <div class="p-4 mb-8 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex items-center gap-3">
        <i class="fa-solid fa-circle-check text-lg"></i>
        <p class="text-sm font-medium">{{ session('success') }}</p>
    </div>
@endif

<div class="admin-card overflow-hidden">
    <div class="p-6 border-b border-white/5 flex items-center justify-between">
        <h3 class="text-sm font-semibold text-white uppercase tracking-wider">All Units</h3>
        <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">{{ $projects->count() }} Total</span>
    </div>
    
    <div class="overflow-x-auto">
        <table class="modern-table">
            <thead>
                <tr>
                    <th class="pl-6">Project Details</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Visual</th>
                    <th class="text-right pr-6">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                    <tr class="group">
                        <td class="pl-6">
                            <div class="flex flex-col">
                                <span class="text-sm font-semibold text-white group-hover:text-indigo-400 transition-colors">{{ $project->name }}</span>
                                <span class="text-xs text-gray-500 line-clamp-1 max-w-[300px] mt-1 font-medium">{{ $project->description }}</span>
                            </div>
                        </td>
                        <td>
                            <span class="text-xs text-gray-400 font-medium">{{ $project->category }}</span>
                        </td>
                        <td>
                            <div class="flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                <span class="text-[10px] font-bold text-emerald-500 uppercase tracking-widest">Active</span>
                            </div>
                        </td>
                        <td>
                            <div class="w-12 h-12 rounded-xl bg-white/5 overflow-hidden border border-white/5">
                                @if($project->image)
                                    <img src="{{ asset('storage/' . $project->image) }}" class="w-full h-full object-cover opacity-70 group-hover:opacity-100 transition duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-700">
                                        <i class="fa-solid fa-image"></i>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td class="pr-6 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="w-9 h-9 rounded-xl bg-white/5 flex items-center justify-center text-gray-500 hover:text-white transition">
                                    <i class="fa-solid fa-pen-to-square text-xs"></i>
                                </a>
                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Delete this project?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-9 h-9 rounded-xl bg-white/5 flex items-center justify-center text-gray-500 hover:text-red-400 transition">
                                        <i class="fa-solid fa-trash text-xs"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-24 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-16 h-16 rounded-2xl bg-white/5 flex items-center justify-center text-gray-700 mb-4 border border-dashed border-white/10">
                                    <i class="fa-solid fa-inbox text-2xl"></i>
                                </div>
                                <p class="text-sm text-gray-500 font-medium">No assets found in the current registry.</p>
                                <a href="{{ route('admin.projects.create') }}" class="mt-6 btn-modern-primary py-2 px-6 text-xs">Initialize First Project</a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
