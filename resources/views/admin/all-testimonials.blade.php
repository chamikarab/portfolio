@extends('layouts.admin')

@section('title', 'Testimonials')

@section('content')

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
                                    <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" onsubmit="return confirm('Delete this testimonial?');">
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