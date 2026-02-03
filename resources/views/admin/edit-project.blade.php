@extends('layouts.admin')

@section('title', 'Modify Project')

@section('content')

<header class="admin-header">
    <div>
        <h1 class="admin-page-title">Modify Project</h1>
        <p class="text-gray-500 text-sm mt-1">Update parameters for: <span class="text-white">{{ $project->name }}</span></p>
    </div>
    <a href="{{ route('admin.all-projects') }}" class="btn-modern-secondary text-xs">
        <i class="fa-solid fa-arrow-left"></i>
        Discard Changes
    </a>
</header>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
    <div class="lg:col-span-2">
        <div class="admin-card p-10">
            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')

                <div class="space-y-2">
                    <label for="name" class="text-[11px] font-bold text-gray-500 uppercase tracking-widest ml-1">Project Nomenclature</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $project->name) }}" class="admin-input-modern" required>
                    @error('name') <p class="text-red-400 text-[10px] font-bold uppercase mt-2 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label for="category" class="text-[11px] font-bold text-gray-500 uppercase tracking-widest ml-1">Classification</label>
                        <input type="text" name="category" id="category" value="{{ old('category', $project->category) }}" class="admin-input-modern" required>
                        @error('category') <p class="text-red-400 text-[10px] font-bold uppercase mt-2 ml-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="space-y-2">
                        <label for="image" class="text-[11px] font-bold text-gray-500 uppercase tracking-widest ml-1">Visual Update (Optional)</label>
                        <div class="relative group">
                            <input type="file" name="image" id="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" onchange="updateFileName(this)">
                            <div class="admin-input-modern flex items-center justify-between group-hover:border-white/20 transition">
                                <span id="file-name" class="text-gray-500 truncate">Replace visual frame...</span>
                                <i class="fa-solid fa-camera text-indigo-400"></i>
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
                        >{!! old('description', $project->description) !!}</div>

                        {{-- Hidden textarea that actually submits the HTML --}}
                        <textarea
                            name="description"
                            id="description"
                            class="hidden"
                            required
                        >{{ old('description', $project->description) }}</textarea>
                    </div>

                    @error('description') <p class="text-red-400 text-[10px] font-bold uppercase mt-2 ml-1">{{ $message }}</p> @enderror
                </div>

                <div class="pt-4 flex gap-4">
                    <button type="submit" class="btn-modern-primary flex-1 justify-center py-4 text-sm tracking-widest uppercase">
                        <i class="fa-solid fa-check-circle"></i>
                        Confirm Updates
                    </button>
                    <a href="{{ route('admin.all-projects') }}" class="btn-modern-secondary justify-center py-4 px-10 text-sm tracking-widest uppercase">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="space-y-8">
        <div class="admin-card p-8 border-indigo-500/10 bg-indigo-500/[0.02]">
            <h4 class="text-white font-bold text-xs uppercase tracking-widest mb-6">Active Visual</h4>
            <div class="aspect-video rounded-xl bg-white/5 overflow-hidden border border-white/5 mb-4">
                <img src="{{ $project->image_url }}" 
                     class="w-full h-full object-cover"
                     onerror="this.onerror=null; this.src='{{ asset('assets/placeholder.svg') }}';">
            </div>
            <p class="text-[10px] text-gray-600 font-bold uppercase tracking-[0.2em] text-center">Currently Deployed Frame</p>
        </div>

        <div class="admin-card p-8">
            <h4 class="text-white font-bold text-xs uppercase tracking-widest mb-6">Entity Metadata</h4>
            <div class="space-y-4 text-[11px]">
                <div class="flex justify-between border-b border-white/5 pb-3">
                    <span class="text-gray-500">Established</span>
                    <span class="text-gray-300 font-medium">{{ $project->created_at->format('M d, Y') }}</span>
                </div>
                <div class="flex justify-between border-b border-white/5 pb-3">
                    <span class="text-gray-500">Last Sync</span>
                    <span class="text-gray-300 font-medium">{{ $project->updated_at->format('M d, Y') }}</span>
                </div>
                <div class="flex justify-between pt-1">
                    <span class="text-gray-500">Node Status</span>
                    <span class="text-green-400 font-bold uppercase tracking-widest">Public Protocol</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateFileName(input) {
        const fileName = input.files[0] ? input.files[0].name : 'Replace visual frame...';
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

        const syncToTextarea = () => {
            textarea.value = editor.innerHTML.trim();
        };

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

        const form = editor.closest('form');
        if (form) {
            form.addEventListener('submit', syncToTextarea);
        }
    });
</script>

@endsection
