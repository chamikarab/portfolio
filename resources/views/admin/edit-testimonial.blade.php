@extends('layouts.admin')

@section('title', 'Modify Signal')

@section('content')

<header class="admin-header">
    <div>
        <h1 class="admin-page-title">Modify Signal</h1>
        <p class="text-gray-500 text-sm mt-1">Update validation parameters for: <span class="text-white">{{ $testimonial->client_name }}</span></p>
    </div>
    <a href="{{ route('admin.all-testimonials') }}" class="btn-modern-secondary text-xs">
        <i class="fa-solid fa-arrow-left"></i>
        Discard
    </a>
</header>

<div class="max-w-3xl mx-auto">
    <div class="admin-card p-10">
        <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')

            <div class="space-y-2">
                <label for="name" class="text-[11px] font-bold text-gray-500 uppercase tracking-widest ml-1">Source Identity</label>
                <input type="text" name="name" id="name" value="{{ old('name', $testimonial->client_name) }}" class="admin-input-modern" required>
                @error('name') <p class="text-red-400 text-[10px] font-bold uppercase mt-2 ml-1">{{ $message }}</p> @enderror
            </div>

            <div class="space-y-2">
                <label for="testimonial" class="text-[11px] font-bold text-gray-500 uppercase tracking-widest ml-1">Signal Payload</label>
                <textarea name="testimonial" id="testimonial" rows="8" class="admin-input-modern resize-none" required>{{ old('testimonial', $testimonial->testimonial) }}</textarea>
                @error('testimonial') <p class="text-red-400 text-[10px] font-bold uppercase mt-2 ml-1">{{ $message }}</p> @enderror
            </div>

            <div class="pt-4 flex gap-4">
                <button type="submit" class="btn-modern-primary flex-1 justify-center py-4 text-sm tracking-widest uppercase">
                    <i class="fa-solid fa-check-circle"></i>
                    Update Registry
                </button>
                <a href="{{ route('admin.all-testimonials') }}" class="btn-modern-secondary px-10 justify-center py-4 text-sm tracking-widest uppercase">
                    Cancel
                </a>
            </div>
        </form>
    </div>

    <div class="mt-10 p-8 admin-card">
        <h4 class="text-white font-bold text-xs uppercase tracking-widest mb-6">Signal Metadata</h4>
        <div class="space-y-4 text-[11px]">
            <div class="flex justify-between border-b border-white/5 pb-3">
                <span class="text-gray-500">Intercepted</span>
                <span class="text-gray-300 font-medium">{{ $testimonial->created_at->format('M d, Y') }}</span>
            </div>
            <div class="flex justify-between pt-1">
                <span class="text-gray-500">Status</span>
                <span class="text-green-400 font-bold uppercase tracking-widest">Active Signal</span>
            </div>
        </div>
    </div>
</div>

@endsection
