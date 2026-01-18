@extends('layouts.admin')

@section('title', 'Add Signal')

@section('content')

<header class="admin-header">
    <div>
        <h1 class="admin-page-title">Inject New Signal</h1>
        <p class="text-gray-500 text-sm mt-1">Capture client feedback for social proofing.</p>
    </div>
    <a href="{{ route('admin.all-testimonials') }}" class="btn-modern-secondary text-xs">
        <i class="fa-solid fa-arrow-left"></i>
        Abort
    </a>
</header>

<div class="max-w-3xl mx-auto">
    <div class="admin-card p-10">
        <form action="{{ route('admin.testimonials.store') }}" method="POST" class="space-y-8">
            @csrf

            <div class="space-y-2">
                <label for="name" class="text-[11px] font-bold text-gray-500 uppercase tracking-widest ml-1">Source Identity</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="e.g. Marcus Aurelius" class="admin-input-modern" required>
                @error('name') <p class="text-red-400 text-[10px] font-bold uppercase mt-2 ml-1">{{ $message }}</p> @enderror
            </div>

            <div class="space-y-2">
                <label for="testimonial" class="text-[11px] font-bold text-gray-500 uppercase tracking-widest ml-1">Signal Payload</label>
                <textarea name="testimonial" id="testimonial" rows="6" placeholder="Paste the specific feedback broadcasted by the source..." class="admin-input-modern resize-none" required>{{ old('testimonial') }}</textarea>
                @error('testimonial') <p class="text-red-400 text-[10px] font-bold uppercase mt-2 ml-1">{{ $message }}</p> @enderror
            </div>

            <div class="pt-4">
                <button type="submit" class="btn-modern-primary w-full justify-center py-4 text-sm tracking-widest uppercase">
                    <i class="fa-solid fa-satellite-dish"></i>
                    Broadcast Signal
                </button>
            </div>
        </form>
    </div>

    <div class="mt-10 p-8 admin-card bg-indigo-500/[0.02] border-indigo-500/10">
        <div class="flex items-center gap-3 mb-4">
            <i class="fa-solid fa-lightbulb text-indigo-400"></i>
            <h4 class="text-xs font-bold text-white uppercase tracking-widest">Signal Strategy</h4>
        </div>
        <p class="text-gray-500 text-[11px] leading-relaxed">
            High-fidelity signals focus on operational outcomes rather than general praise. Aim for feedback that mentions specific problem-solving scenarios for maximum conversion impact in 2026.
        </p>
    </div>
</div>

@endsection
