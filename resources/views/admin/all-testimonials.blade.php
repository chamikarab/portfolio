@extends('layouts.admin')

@section('title', 'Testimonials')

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
            <h1 class="admin-page-title">Testimonials</h1>
            <p class="admin-page-subtitle">Client feedback displayed on your portfolio.</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="admin-btn-primary">
            <span>+ New Testimonial</span>
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
            <h2 class="admin-card-title">All Testimonials</h2>
            <span class="admin-badge-pill">{{ $testimonials->count() }} total</span>
        </div>
        <div style="overflow-x:auto;">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Testimonial</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $testimonial)
                        <tr>
                            <td>{{ $testimonial->client_name }}</td>
                            <td style="max-width:260px;white-space:normal;">{{ $testimonial->testimonial }}</td>
                            <td>
                                <div class="admin-table-actions">
                                    <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="admin-btn-ghost btn-edit">
                                        <i class="fa-solid fa-pen-to-square text-[10px]"></i>
                                        <span>Edit</span>
                                    </a>
                                    <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" onsubmit="return confirm('Delete this testimonial?');" class="inline">
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
                            <td colspan="3" style="text-align:center;font-size:13px;color:#9ca3af;padding:18px 0;">
                                No testimonials yet. Add your first testimonial to build social proof.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection