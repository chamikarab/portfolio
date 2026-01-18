@extends('layouts.admin')

@section('title', 'Social Proof')

@section('content')

<header class="admin-header">
    <div>
        <h1 class="admin-page-title">Social Proof</h1>
        <p class="text-gray-500 text-sm mt-1">Manage client signals and testimonials.</p>
    </div>
    <a href="{{ route('admin.testimonials.create') }}" class="btn-modern-primary">
        <i class="fa-solid fa-plus text-xs"></i>
        New Signal
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
        <h3 class="text-sm font-semibold text-white uppercase tracking-wider">Validation Registry</h3>
        <span class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">{{ $testimonials->count() }} Total</span>
    </div>
    
    <div class="overflow-x-auto">
        <table class="modern-table">
            <thead>
                <tr>
                    <th class="pl-6">Source</th>
                    <th>Feedback</th>
                    <th>Date Added</th>
                    <th class="text-right pr-6">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonials as $testimonial)
                    <tr class="group">
                        <td class="pl-6">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-indigo-500/10 flex items-center justify-center text-indigo-400 text-[10px] font-bold border border-indigo-500/10">
                                    {{ strtoupper(substr($testimonial->client_name, 0, 1)) }}
                                </div>
                                <span class="text-sm font-semibold text-white group-hover:text-indigo-400 transition-colors">{{ $testimonial->client_name }}</span>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs text-gray-500 italic line-clamp-2 max-w-md leading-relaxed">"{{ $testimonial->testimonial }}"</p>
                        </td>
                        <td>
                            <span class="text-[11px] text-gray-500 font-bold uppercase tracking-widest">{{ $testimonial->created_at->format('M d, Y') }}</span>
                        </td>
                        <td class="pr-6 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="w-9 h-9 rounded-xl bg-white/5 flex items-center justify-center text-gray-500 hover:text-white transition">
                                    <i class="fa-solid fa-pen-to-square text-xs"></i>
                                </a>
                                <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" onsubmit="return confirm('Delete this testimonial?');" class="inline">
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
                        <td colspan="4" class="py-24 text-center">
                            <div class="flex flex-col items-center">
                                <div class="w-16 h-16 rounded-2xl bg-white/5 flex items-center justify-center text-gray-700 mb-4 border border-dashed border-white/10">
                                    <i class="fa-solid fa-comment-dots text-2xl"></i>
                                </div>
                                <p class="text-sm text-gray-500 font-medium">No testimonials found in the registry.</p>
                                <a href="{{ route('admin.testimonials.create') }}" class="mt-6 btn-modern-primary py-2 px-6 text-xs">Add First Signal</a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
