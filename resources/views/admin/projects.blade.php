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
                    <label for="description-editor" class="text-[11px] font-bold text-gray-500 uppercase tracking-widest ml-1">Project Narrative</label>

                    <div class="space-y-2">
                        <div class="flex flex-wrap gap-2 border border-white/10 rounded-lg bg-black/20 px-2 py-1 text-[10px] text-gray-400">
                            <button type="button" class="px-2 py-1 rounded-md hover:bg-white/10 flex items-center gap-1" data-editor-command="bold">
                                <i class="fa-solid fa-bold"></i>
                                <span class="hidden sm:inline">Bold</span>
                            </button>
                            <button type="button" class="px-2 py-1 rounded-md hover:bg-white/10 flex items-center gap-1" data-editor-command="italic">
                                <i class="fa-solid fa-italic"></i>
                                <span class="hidden sm:inline">Italic</span>
                            </button>
                            <button type="button" class="px-2 py-1 rounded-md hover:bg-white/10 flex items-center gap-1" data-editor-command="underline">
                                <i class="fa-solid fa-underline"></i>
                                <span class="hidden sm:inline">Underline</span>
                            </button>
                            <span class="w-px h-5 bg-white/10 mx-1"></span>
                            <button type="button" class="px-2 py-1 rounded-md hover:bg-white/10 flex items-center gap-1" data-editor-command="insertUnorderedList">
                                <i class="fa-solid fa-list-ul"></i>
                                <span class="hidden sm:inline">Bullets</span>
                            </button>
                            <button type="button" class="px-2 py-1 rounded-md hover:bg-white/10 flex items-center gap-1" data-editor-command="insertOrderedList">
                                <i class="fa-solid fa-list-ol"></i>
                                <span class="hidden sm:inline">Numbered</span>
                            </button>
                            <span class="w-px h-5 bg-white/10 mx-1"></span>
                            <button type="button" class="px-2 py-1 rounded-md hover:bg-white/10 flex items-center gap-1" data-editor-command="createLink">
                                <i class="fa-solid fa-link"></i>
                                <span class="hidden sm:inline">Link</span>
                            </button>
                            <button type="button" class="px-2 py-1 rounded-md hover:bg-white/10 flex items-center gap-1" data-editor-command="removeFormat">
                                <i class="fa-solid fa-eraser"></i>
                                <span class="hidden sm:inline">Clear</span>
                            </button>
                        </div>

                        <div
                            id="description-editor"
                            class="admin-input-modern resize-none min-h-[160px] overflow-y-auto prose prose-invert max-w-none project-description-editor"
                            contenteditable="true"
                        >{!! old('description') !!}</div>

                        {{-- Hidden textarea that actually submits the HTML --}}
                        <textarea
                            name="description"
                            id="description"
                            class="hidden"
                            required
                        >{{ old('description') }}</textarea>
                    </div>

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

    // Lightweight rich text editor for the Project Narrative field
    document.addEventListener('DOMContentLoaded', function () {
        const editor = document.getElementById('description-editor');
        const textarea = document.getElementById('description');

        if (!editor || !textarea) return;

        // Ensure textarea is in sync with editor contents
        const syncToTextarea = () => {
            textarea.value = editor.innerHTML.trim();
        };

        // Initial sync in case content was modified by browser
        syncToTextarea();

        editor.addEventListener('input', syncToTextarea);

        // Normalize URL (add https:// when user types bare domain like www.example.com)
        const normalizeUrl = (url) => {
            if (!url) return '';
            const trimmed = url.trim();
            // If it already has a scheme, keep it
            if (/^[a-zA-Z][a-zA-Z0-9+.-]*:/.test(trimmed)) {
                return trimmed;
            }
            // If it looks like www.example.com, prefix https://
            if (trimmed.startsWith('www.')) {
                return 'https://' + trimmed;
            }
            // Otherwise, assume https://
            return 'https://' + trimmed;
        };

        // Toolbar buttons
        document.querySelectorAll('[data-editor-command]').forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();

                const command = this.getAttribute('data-editor-command');

                if (command === 'createLink') {
                    const raw = prompt('Enter URL (e.g. https://example.com or www.example.com)');
                    if (!raw) return;
                    const url = normalizeUrl(raw);
                    document.execCommand(command, false, url);
                } else {
                    document.execCommand(command, false, null);
                }

                editor.focus();
                syncToTextarea();
            });
        });

        // Final sync on form submit
        const form = editor.closest('form');
        if (form) {
            form.addEventListener('submit', syncToTextarea);
        }
    });
</script>

@endsection
