@extends('layouts.admin')

@section('title', 'Projects')

@section('content')

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
                                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Delete this project?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="admin-btn-ghost">
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