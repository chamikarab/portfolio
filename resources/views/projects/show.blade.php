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
                <div class="glass rounded-2xl sm:rounded-3xl overflow-hidden mb-4">
                    <img
                        id="project-main-image"
                        src="{{ $galleryImages->first()->image_url }}"
                        alt="{{ $project->name }}"
                        class="w-full h-48 sm:h-64 md:h-80 object-cover transition-opacity duration-300"
                        onerror="this.onerror=null; this.src='{{ asset('assets/placeholder.svg') }}';"
                    >
                </div>
                @if($galleryImages->count() > 1)
                    <div class="flex gap-2 sm:gap-3 overflow-x-auto pb-1">
                        @foreach($galleryImages as $index => $img)
                            <button
                                type="button"
                                class="project-thumb shrink-0 rounded-xl overflow-hidden border-2 transition {{ $index === 0 ? 'border-purple-400' : 'border-transparent opacity-70 hover:opacity-100' }}"
                                data-image="{{ $img->image_url }}"
                                onclick="setProjectImage(this)"
                            >
                                <img
                                    src="{{ $img->image_url }}"
                                    alt="{{ $project->name }} thumbnail {{ $index + 1 }}"
                                    class="w-20 h-14 sm:w-24 sm:h-16 object-cover"
                                    onerror="this.onerror=null; this.src='{{ asset('assets/placeholder.svg') }}';"
                                >
                            </button>
                        @endforeach
                    </div>
                @endif
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
    function setProjectImage(button) {
        const mainImage = document.getElementById('project-main-image');
        if (!mainImage) return;

        mainImage.style.opacity = '0';
        setTimeout(() => {
            mainImage.src = button.dataset.image;
            mainImage.style.opacity = '1';
        }, 150);

        document.querySelectorAll('.project-thumb').forEach(thumb => {
            thumb.classList.remove('border-purple-400');
            thumb.classList.add('border-transparent', 'opacity-70');
        });
        button.classList.add('border-purple-400');
        button.classList.remove('border-transparent', 'opacity-70');
    }

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
