@extends('layouts.app')

@section('title', 'Projects - Chamikara Bandara')

@section('content')

<section class="pt-20 sm:pt-24 md:pt-28 lg:pt-32 pb-12 sm:pb-16 md:pb-20 min-h-screen">
    <div class="container mx-auto px-4 sm:px-6 md:px-8 lg:px-12">
        <h2 class="section-title fade-in-up mb-8 sm:mb-12 md:mb-16">
            <span>My</span> <span>Projects</span>
        </h2>

        @if($projects->isEmpty())
            <div class="text-center py-12 sm:py-16 md:py-20">
                <i class="fas fa-folder-open text-5xl sm:text-6xl gradient-text mb-4 sm:mb-6"></i>
                <p class="text-gray-400 text-lg sm:text-xl">No projects available at the moment.</p>
            </div>
        @else
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @foreach ($projects as $project)
                    <div class="project-card-modern fade-in-up">
                        <div class="overflow-hidden rounded-t-2xl relative group">
                            <img src="{{ asset('storage/' . $project->image) }}" 
                                 alt="{{ $project->name }}" 
                                 class="w-full h-40 sm:h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="p-4 sm:p-6">
                            <span class="text-xs text-purple-400 font-semibold uppercase tracking-wider mb-2 block">
                                {{ $project->category ?? 'Web Development' }}
                            </span>
                            <h3 class="text-lg sm:text-xl font-bold text-white mb-2 sm:mb-3">{{ $project->name }}</h3>
                            <p class="text-gray-400 text-sm sm:text-base mb-3 sm:mb-4 leading-relaxed">{{ Str::limit($project->description, 100) }}</p>
                            <a href="{{ route('projects.show', $project->id) }}" 
                               class="inline-flex items-center text-purple-400 hover:text-purple-300 font-semibold text-sm sm:text-base transition-colors duration-300">
                                View Project <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<script>
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
</script>

@endsection
