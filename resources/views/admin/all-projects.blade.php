@extends('layouts.admin')

@section('title', 'Projects')

@section('content')

@push('styles')
<style>
    .btn-edit {
        border-color: #10b981 !important;
        color: #10b981 !important;
        background-color: #ecfdf5 !important;
    }
    .btn-edit:hover {
        border-color: #059669 !important;
        color: #ffffff !important;
        background-color: #10b981 !important;
    }
    .btn-delete {
        border-color: #ef4444 !important;
        color: #ef4444 !important;
        background-color: #fef2f2 !important;
    }
    .btn-delete:hover {
        border-color: #dc2626 !important;
        color: #ffffff !important;
        background-color: #ef4444 !important;
    }
</style>
@endpush

<div>
    <div class="admin-card-header" style="margin-bottom:12px;">
        <div>
            <h1 class="admin-page-title">Projects</h1>
            <p class="admin-page-subtitle">Manage all portfolio projects from one place.</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="admin-btn-primary">
            <span>+ New Project</span>
        </a>
    </div>

    @if(session('success'))
        <div class="admin-alert-success mb-4">
            <i class="fa-solid fa-circle-check mr-2"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-card">
        <div class="admin-card-header">
            <h2 class="admin-card-title">All Projects</h2>
            <span class="admin-badge-pill">{{ $projects->count() }} total</span>
        </div>
        <div style="overflow-x:auto;">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Project</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                        <tr>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->category }}</td>
                            <td style="max-width:260px;white-space:normal;">{{ $project->description }}</td>
                            <td>
                                @if($project->image)
                                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}" style="width: 80px;border-radius:8px;border:1px solid rgba(148,163,184,0.5);">
                                @else
                                    <span class="admin-chip-muted">No image</span>
                                @endif
                            </td>
                            <td>
                                <div class="admin-table-actions">
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="admin-btn-ghost btn-edit">
                                        <i class="fa-solid fa-pen-to-square text-[10px]"></i>
                                        <span>Edit</span>
                                    </a>
                                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Delete this project?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="admin-btn-ghost btn-delete">
                                            <i class="fa-solid fa-trash text-[10px]"></i>
                                            <span>Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align:center;font-size:13px;color:#9ca3af;padding:18px 0;">
                                No projects yet. Create your first project to populate your portfolio.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection