@extends('layouts.admin')

@section('title', 'Deploy Project')

@section('content')

<header class="admin-header">
    <div>
        <h1 class="admin-page-title">Deploy New Project</h1>
        <p class="text-gray-500 text-sm mt-1">Add a fresh piece of work to your portfolio registry.</p>
    </div>
    <a href="{{ route('admin.all-projects') }}" class="btn-modern-secondary text-xs">
        <i class="fa-solid fa-arrow-left"></i>
        Return to Registry
    </a>
</header>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
    <div class="lg:col-span-2">
        <div class="admin-card p-10">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <div class="space-y-2">
                    <label for="name" class="text-[11px] font-bold text-gray-500 uppercase tracking-widest ml-1">Project Nomenclature</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="e.g. Neo-Financial Dashboard" class="admin-input-modern" required>
                    @error('name') <p class="text-red-400 text-[10px] font-bold uppercase mt-2 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label for="category" class="text-[11px] font-bold text-gray-500 uppercase tracking-widest ml-1">Classification</label>
                        <input type="text" name="category" id="category" value="{{ old('category') }}" placeholder="e.g. Web Architecture" class="admin-input-modern" required>
                        @error('category') <p class="text-red-400 text-[10px] font-bold uppercase mt-2 ml-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="space-y-2">
                        <label for="image" class="text-[11px] font-bold text-gray-500 uppercase tracking-widest ml-1">Visual Asset</label>
                        <div class="relative group">
                            <input type="file" name="image" id="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" required onchange="updateFileName(this)">
                            <div class="admin-input-modern flex items-center justify-between group-hover:border-white/20 transition">
                                <span id="file-name" class="text-gray-500 truncate">Select image file...</span>
                                <i class="fa-solid fa-cloud-arrow-up text-indigo-400"></i>
                            </div>
                        </div>
                        @error('image') <p class="text-red-400 text-[10px] font-bold uppercase mt-2 ml-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="description" class="text-[11px] font-bold text-gray-500 uppercase tracking-widest ml-1">Project Narrative</label>
                    <textarea name="description" id="description" rows="6" placeholder="Describe the operational parameters and visual impact of this project..." class="admin-input-modern resize-none" required>{{ old('description') }}</textarea>
                    @error('description') <p class="text-red-400 text-[10px] font-bold uppercase mt-2 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="pt-4">
                    <button type="submit" class="btn-modern-primary w-full justify-center py-4 text-sm tracking-widest uppercase">
                        <i class="fa-solid fa-plus-circle"></i>
                        Initialize Deployment
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="space-y-8">
        <div class="admin-card p-8 border-indigo-500/10 bg-indigo-500/[0.02]">
            <h4 class="text-white font-bold text-xs uppercase tracking-widest mb-6 flex items-center gap-2">
                <i class="fa-solid fa-circle-info text-indigo-400"></i>
                Deployment Standards
            </h4>
            <ul class="space-y-6 text-[11px] leading-relaxed text-gray-500">
                <li class="flex gap-4">
                    <span class="text-indigo-400 font-bold">01</span>
                    Visual assets should be optimized for high-density 4K displays.
                </li>
                <li class="flex gap-4">
                    <span class="text-indigo-400 font-bold">02</span>
                    Classification tags help in semantic indexing and user navigation.
                </li>
                <li class="flex gap-4">
                    <span class="text-indigo-400 font-bold">03</span>
                    Narratives should focus on measurable impact and technical excellence.
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    function updateFileName(input) {
        const fileName = input.files[0] ? input.files[0].name : 'Select image file...';
        const display = document.getElementById('file-name');
        display.textContent = fileName;
        display.classList.remove('text-gray-500');
        display.classList.add('text-white');
    }
</script>

@endsection
