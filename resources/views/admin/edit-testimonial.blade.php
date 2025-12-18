@extends('layouts.admin')

@section('title', 'Edit Testimonial')

@section('content')

<div class="admin-card">
    <div class="admin-card-header">
        <div>
            <h1 class="admin-page-title">Edit Testimonial</h1>
            <p class="admin-page-subtitle">Update client feedback displayed on your portfolio.</p>
        </div>
        <a href="{{ route('admin.all-testimonials') }}" class="admin-btn-ghost">
            <i class="fa-solid fa-arrow-left-long text-[11px] mr-1"></i>
            <span>Back to list</span>
        </a>
    </div>

    @if(session('success'))
        <div class="admin-alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-4 rounded-xl border border-rose-500/40 bg-rose-500/10 px-4 py-3 text-sm text-rose-200">
            <p class="font-medium mb-1">Please fix the following:</p>
            <ul class="list-disc list-inside space-y-0.5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="clientName" class="block text-[11px] font-semibold tracking-[0.16em] uppercase text-slate-600">
                Client Name*
            </label>
            <input
                type="text"
                name="name"
                id="clientName"
                value="{{ old('name', $testimonial->client_name) }}"
                placeholder="Client Name"
                required
                class="admin-form-control mt-1"
            >
        </div>

        <div>
            <label for="testimonial" class="block text-[11px] font-semibold tracking-[0.16em] uppercase text-slate-600">
                Testimonial*
            </label>
            <textarea
                name="testimonial"
                id="testimonial"
                rows="5"
                required
                placeholder="What your client said about working with you..."
                class="admin-form-control mt-1 resize-y"
            >{{ old('testimonial', $testimonial->testimonial) }}</textarea>
            <p class="mt-1 text-[11px] text-slate-500">
                Keep it authentic and specific — this builds trust with visitors.
            </p>
        </div>

        <div class="flex items-center justify-between pt-2">
            <a href="{{ route('admin.all-testimonials') }}" class="admin-btn-ghost">
                <i class="fa-solid fa-xmark text-[11px] mr-1"></i>
                <span>Cancel</span>
            </a>
            <button type="submit" class="admin-btn-primary">
                <i class="fa-solid fa-floppy-disk text-[11px] mr-1"></i>
                <span>Update Testimonial</span>
            </button>
        </div>
    </form>
</div>

@endsection
