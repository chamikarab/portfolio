@extends('layouts.admin')

@section('title', 'Add Project')

@section('content')

<div class="grid gap-5 lg:grid-cols-[minmax(0,2fr)_minmax(0,1fr)]">
    <!-- Main form card -->
    <div class="admin-card">
        <div class="admin-card-header">
            <div>
                <h1 class="admin-page-title">Add new project</h1>
                <p class="admin-page-subtitle">
                    Create a polished project entry that will appear on your public portfolio.
                </p>
            </div>
            <a href="{{ route('admin.all-projects') }}" class="admin-btn-ghost">
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

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label for="projectName" class="block text-[11px] font-semibold tracking-[0.16em] uppercase text-slate-400">
                    Project name*
                </label>
                <input
                    type="text"
                    name="name"
                    id="projectName"
                    value="{{ old('name') }}"
                    placeholder="e.g. Modern Portfolio Website"
                    required
                    class="admin-form-control mt-1"
                >
            </div>

            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label for="projectCategory" class="block text-[11px] font-semibold tracking-[0.16em] uppercase text-slate-400">
                        Category*
                    </label>
                    <input
                        type="text"
                        name="category"
                        id="projectCategory"
                        value="{{ old('category') }}"
                        placeholder="e.g. Web Development, UI/UX, Mobile"
                        required
                        class="admin-form-control mt-1"
                    >
                </div>

                <div>
                    <label for="projectImage" class="block text-[11px] font-semibold tracking-[0.16em] uppercase text-slate-400">
                        Featured image*
                    </label>
                    <input
                        type="file"
                        name="image"
                        id="projectImage"
                        required
                        class="admin-form-control mt-1 file:mr-3 file:rounded-lg file:border-0 file:bg-slate-800 file:px-3 file:py-1.5 file:text-xs file:font-medium file:text-slate-100 hover:file:bg-slate-700"
                    >
                    <p class="mt-1 text-[11px] text-slate-500">
                        Recommended size: 1200×800px • JPG or PNG • &lt; 2MB
                    </p>
                </div>
            </div>

            <div>
                <label for="projectDescription" class="block text-[11px] font-semibold tracking-[0.16em] uppercase text-slate-400">
                    Description*
                </label>
                <textarea
                    name="description"
                    id="projectDescription"
                    rows="5"
                    required
                    placeholder="Describe the problem, your solution, and the outcome."
                    class="admin-form-control mt-1 resize-y"
                >{{ old('description') }}</textarea>
                <p class="mt-1 text-[11px] text-slate-500">
                    Keep it concise but specific — this is what visitors will read on your project page.
                </p>
            </div>

            <div class="flex items-center justify-between pt-2">
                <p class="text-[11px] text-slate-500">
                    You can always edit this project later from the projects list.
                </p>
                <button type="submit" class="admin-btn-primary">
                    <i class="fa-solid fa-floppy-disk text-[11px] mr-1"></i>
                    <span>Save project</span>
                </button>
            </div>
        </form>
    </div>

    <!-- Side info card -->
    <div class="admin-card">
        <h2 class="admin-card-title mb-2">Tips for a strong project</h2>
        <ul class="mt-2 space-y-2 text-sm text-slate-700">
            <li class="flex gap-2">
                <span class="mt-1 h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                <span>Use a clear, outcome‑focused title (what you built and for whom).</span>
            </li>
            <li class="flex gap-2">
                <span class="mt-1 h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                <span>Mention the stack or tools you used if it helps show your strengths.</span>
            </li>
            <li class="flex gap-2">
                <span class="mt-1 h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                <span>Add a high‑quality screenshot that instantly communicates the value.</span>
            </li>
        </ul>
    </div>
</div>

@endsection