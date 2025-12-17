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

            <!-- Project Image -->
            <div class="glass rounded-2xl sm:rounded-3xl overflow-hidden mb-8 sm:mb-10 md:mb-12 fade-in-up">
                <img src="{{ asset('storage/' . $project->image) }}" 
                     alt="{{ $project->name }}" 
                     class="w-full h-auto object-cover">
            </div>

            <!-- Project Description -->
            <div class="glass rounded-2xl sm:rounded-3xl p-6 sm:p-8 md:p-10 lg:p-12 fade-in-up">
                <h2 class="text-xl sm:text-2xl font-bold text-white mb-4 sm:mb-6">About This Project</h2>
                <div class="prose prose-invert max-w-none">
                    <p class="text-gray-300 text-base sm:text-lg leading-relaxed whitespace-pre-line">{{ $project->description }}</p>
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
