@extends('layouts.app')

@section('title', $project->name . ' - Chamikara Bandara')

@section('content')

<section class="pt-20 sm:pt-24 md:pt-28 lg:pt-32 pb-12 sm:pb-16 md:pb-20 min-h-screen">
    <div class="container mx-auto px-4 sm:px-6 md:px-8 lg:px-12">
        <div class="max-w-4xl mx-auto">
            <!-- Back Button -->
            <a href="{{ route('projects.index') }}" 
               class="inline-flex items-center text-purple-400 hover:text-purple-300 mb-6 sm:mb-8 transition-colors duration-300 fade-in-up text-sm sm:text-base">
                <i class="fas fa-arrow-left mr-2"></i> Back to Projects
            </a>

            <!-- Project Header -->
            <div class="fade-in-up mb-8 sm:mb-10 md:mb-12">
                <span class="text-xs sm:text-sm text-purple-400 font-semibold uppercase tracking-wider mb-3 sm:mb-4 block">
                    {{ $project->category ?? 'Web Development' }}
                </span>
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-4 sm:mb-6">{{ $project->name }}</h1>
            </div>

            <!-- Project Images -->
            @php
                $galleryImages = $project->images->isNotEmpty()
                    ? $project->images
                    : collect([(object)['image_url' => $project->image_url]]);
            @endphp
            <div class="fade-in-up mb-8 sm:mb-10 md:mb-12">
                <button
                    type="button"
                    id="project-main-image-btn"
                    class="group relative w-full glass rounded-2xl sm:rounded-3xl overflow-hidden mb-4 block text-left cursor-zoom-in focus:outline-none focus-visible:ring-2 focus-visible:ring-purple-400"
                    onclick="openProjectLightbox()"
                    aria-label="View full size image"
                >
                    <img
                        id="project-main-image"
                        src="{{ $galleryImages->first()->image_url }}"
                        alt="{{ $project->name }}"
                        class="w-full h-auto max-w-full object-contain transition-opacity duration-300"
                        onerror="this.onerror=null; this.src='{{ asset('assets/placeholder.svg') }}';"
                    >
                    <span class="absolute inset-0 flex items-center justify-center bg-black/30 opacity-0 group-hover:opacity-100 transition pointer-events-none">
                        <span class="rounded-full bg-black/60 px-4 py-2 text-xs sm:text-sm text-white font-medium">
                            <i class="fas fa-expand mr-2"></i> View full image
                        </span>
                    </span>
                </button>
                <p class="text-center text-[11px] sm:text-xs text-slate-500 mb-3">Click image to view full size</p>
                @if($galleryImages->count() > 1)
                    <div class="flex gap-2 sm:gap-3 overflow-x-auto pb-1">
                        @foreach($galleryImages as $index => $img)
                            <button
                                type="button"
                                class="project-thumb shrink-0 rounded-xl overflow-hidden border-2 transition bg-slate-900/50 {{ $index === 0 ? 'border-purple-400' : 'border-transparent opacity-70 hover:opacity-100' }}"
                                data-image="{{ $img->image_url }}"
                                onclick="setProjectImage(this)"
                            >
                                <img
                                    src="{{ $img->image_url }}"
                                    alt="{{ $project->name }} thumbnail {{ $index + 1 }}"
                                    class="w-20 sm:w-24 h-auto max-h-20 sm:max-h-24 object-contain"
                                    onerror="this.onerror=null; this.src='{{ asset('assets/placeholder.svg') }}';"
                                >
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Full-screen lightbox --}}
            <div id="project-lightbox" class="fixed inset-0 z-[100] hidden items-center justify-center bg-black/95 p-4 sm:p-8" role="dialog" aria-modal="true" aria-label="Full size project image">
                <button type="button" onclick="closeProjectLightbox()" class="absolute top-4 right-4 z-10 h-10 w-10 rounded-full bg-white/10 text-white hover:bg-white/20 transition" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
                @if($galleryImages->count() > 1)
                    <button type="button" onclick="lightboxPrev()" class="absolute left-2 sm:left-4 top-1/2 -translate-y-1/2 z-10 h-10 w-10 sm:h-12 sm:w-12 rounded-full bg-white/10 text-white hover:bg-white/20 transition" aria-label="Previous image">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" onclick="lightboxNext()" class="absolute right-2 sm:right-4 top-1/2 -translate-y-1/2 z-10 h-10 w-10 sm:h-12 sm:w-12 rounded-full bg-white/10 text-white hover:bg-white/20 transition" aria-label="Next image">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                @endif
                <img
                    id="project-lightbox-image"
                    src="{{ $galleryImages->first()->image_url }}"
                    alt="{{ $project->name }}"
                    class="max-w-full max-h-[90vh] w-auto h-auto object-contain"
                >
            </div>

            <!-- Project Description -->
            <div class="glass rounded-2xl sm:rounded-3xl p-6 sm:p-8 md:p-10 lg:p-12 fade-in-up">
                <h2 class="text-xl sm:text-2xl font-bold text-white mb-4 sm:mb-6">About This Project</h2>
                <div class="prose prose-invert max-w-none text-gray-300 text-base sm:text-lg leading-relaxed project-description-content">
                    {!! $project->description !!}
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 mt-8 sm:mt-10 md:mt-12 fade-in-up">
                <a href="{{ route('projects.index') }}" class="btn-secondary text-center">
                    View All Projects
                </a>
                <a href="/contact" class="btn-primary text-center">
                    Get In Touch
                </a>
            </div>
        </div>
    </div>
</section>

<script>
    const projectGalleryUrls = @json($galleryImages->pluck('image_url')->values());
    let projectGalleryIndex = 0;

    function setProjectImage(button) {
        const mainImage = document.getElementById('project-main-image');
        if (!mainImage) return;

        const url = button.dataset.image;
        const index = projectGalleryUrls.indexOf(url);
        if (index >= 0) projectGalleryIndex = index;

        mainImage.style.opacity = '0';
        setTimeout(() => {
            mainImage.src = url;
            mainImage.style.opacity = '1';
        }, 150);

        document.querySelectorAll('.project-thumb').forEach(thumb => {
            thumb.classList.remove('border-purple-400');
            thumb.classList.add('border-transparent', 'opacity-70');
        });
        button.classList.add('border-purple-400');
        button.classList.remove('border-transparent', 'opacity-70');
    }

    function updateLightboxImage() {
        const lightboxImage = document.getElementById('project-lightbox-image');
        const mainImage = document.getElementById('project-main-image');
        if (!lightboxImage || !projectGalleryUrls.length) return;

        const url = projectGalleryUrls[projectGalleryIndex];
        lightboxImage.src = url;
        if (mainImage) mainImage.src = url;

        document.querySelectorAll('.project-thumb').forEach((thumb, i) => {
            const isActive = i === projectGalleryIndex;
            thumb.classList.toggle('border-purple-400', isActive);
            thumb.classList.toggle('border-transparent', !isActive);
            thumb.classList.toggle('opacity-70', !isActive);
        });
    }

    function openProjectLightbox() {
        const lightbox = document.getElementById('project-lightbox');
        const mainImage = document.getElementById('project-main-image');
        if (!lightbox) return;

        if (mainImage) {
            const idx = projectGalleryUrls.findIndex(url => mainImage.src === url || mainImage.src.endsWith(url.replace(/^https?:\/\/[^/]+/, '')));
            if (idx >= 0) projectGalleryIndex = idx;
        }

        updateLightboxImage();
        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeProjectLightbox() {
        const lightbox = document.getElementById('project-lightbox');
        if (!lightbox) return;
        lightbox.classList.add('hidden');
        lightbox.classList.remove('flex');
        document.body.style.overflow = '';
    }

    function lightboxPrev() {
        if (!projectGalleryUrls.length) return;
        projectGalleryIndex = (projectGalleryIndex - 1 + projectGalleryUrls.length) % projectGalleryUrls.length;
        updateLightboxImage();
    }

    function lightboxNext() {
        if (!projectGalleryUrls.length) return;
        projectGalleryIndex = (projectGalleryIndex + 1) % projectGalleryUrls.length;
        updateLightboxImage();
    }

    document.addEventListener('keydown', (e) => {
        const lightbox = document.getElementById('project-lightbox');
        if (!lightbox || lightbox.classList.contains('hidden')) return;
        if (e.key === 'Escape') closeProjectLightbox();
        if (e.key === 'ArrowLeft') lightboxPrev();
        if (e.key === 'ArrowRight') lightboxNext();
    });

    document.getElementById('project-lightbox')?.addEventListener('click', (e) => {
        if (e.target.id === 'project-lightbox') closeProjectLightbox();
    });

    // Fade in animation on scroll
    const fadeElements = document.querySelectorAll('.fade-in-up');
    const fadeObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                fadeObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    fadeElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
        fadeObserver.observe(el);
    });

    // Ensure all links in the project description open in a new tab
    const descContainer = document.querySelector('.project-description-content');
    if (descContainer) {
        const links = descContainer.querySelectorAll('a[href]');
        links.forEach(link => {
            const href = link.getAttribute('href') || '';

            // If no scheme and looks like www.example.com or example.com, prefix https://
            if (!/^[a-zA-Z][a-zA-Z0-9+.-]*:/.test(href)) {
                if (href.startsWith('www.')) {
                    link.setAttribute('href', 'https://' + href);
                } else if (/^[^\/\s]+\.[^\/\s]+/.test(href)) { // simple domain.tld pattern
                    link.setAttribute('href', 'https://' + href);
                }
            }

            link.setAttribute('target', '_blank');
            link.setAttribute('rel', 'noopener noreferrer');
        });
    }
</script>

@endsection
