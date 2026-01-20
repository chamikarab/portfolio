@extends('layouts.app')

@section('title', 'Projects - Chamikara Bandara')

@section('content')

<section class="pt-20 sm:pt-24 md:pt-28 lg:pt-32 pb-12 sm:pb-16 md:pb-20 min-h-screen">
    <div class="container mx-auto px-4 sm:px-6 md:px-8 lg:px-12">
        <h2 class="section-title fade-in-up mb-8 sm:mb-10 md:mb-12">
            <span>My</span> <span>Projects</span>
        </h2>

        @php
            $groupedCategories = $projects->groupBy(function ($project) {
                return $project->category ?? 'Other';
            });
        @endphp

        @if($projects->isEmpty())
            <div class="text-center py-12 sm:py-16 md:py-20">
                <i class="fas fa-folder-open text-5xl sm:text-6xl gradient-text mb-4 sm:mb-6"></i>
                <p class="text-gray-400 text-lg sm:text-xl">No projects available at the moment.</p>
            </div>
        @else
            {{-- Category chips (extra small filter cards) --}}
            <div class="mb-6 sm:mb-8 md:mb-10 fade-in-up">
                <div class="flex flex-wrap gap-2 sm:gap-3">
                    <button 
                        class="glass rounded-full px-3 py-1.5 sm:px-4 sm:py-2 inline-flex items-center gap-2 hover:border-purple-500/70 border border-transparent transition-all duration-300 text-[11px] sm:text-xs font-semibold uppercase tracking-widest text-gray-300 category-filter active"
                        data-category-card="all"
                    >
                        <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-purple-500/20 text-purple-400 text-[10px]">
                            <i class="fas fa-layer-group"></i>
                        </span>
                        <span>All ({{ $projects->count() }})</span>
                    </button>

                    @foreach ($groupedCategories as $categoryName => $items)
                        <button 
                            class="glass rounded-full px-3 py-1.5 sm:px-4 sm:py-2 inline-flex items-center gap-2 hover:border-purple-500/70 border border-transparent transition-all duration-300 text-[11px] sm:text-xs font-semibold uppercase tracking-widest text-gray-300 category-filter"
                            data-category-card="{{ \Illuminate\Support\Str::slug($categoryName) }}"
                        >
                            <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-purple-500/20 text-purple-400 text-[10px]">
                                <i class="fas fa-folder"></i>
                            </span>
                            <span>{{ $categoryName }} ({{ $items->count() }})</span>
                        </button>
                    @endforeach
                </div>
            </div>

            {{-- Project cards --}}
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                @foreach ($projects as $project)
                    <div 
                        class="project-card-modern fade-in-up"
                        data-project-category="{{ \Illuminate\Support\Str::slug($project->category ?? 'Other') }}"
                    >
                        <div class="overflow-hidden rounded-t-2xl relative group">
                            @if($project->image && file_exists(storage_path('app/public/' . $project->image)))
                                <img src="{{ asset('storage/' . $project->image) }}" 
                                     alt="{{ $project->name }}" 
                                     class="w-full h-40 sm:h-48 object-cover transition-transform duration-500 group-hover:scale-110"
                                     onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'400\' height=\'300\'%3E%3Crect fill=\'%231e293b\' width=\'400\' height=\'300\'/%3E%3Ctext x=\'50%25\' y=\'50%25\' text-anchor=\'middle\' dy=\'.3em\' fill=\'%23475569\' font-family=\'sans-serif\' font-size=\'14\'%3EImage Not Found%3C/text%3E%3C/svg%3E';">
                            @else
                                <div class="w-full h-40 sm:h-48 bg-slate-800 flex items-center justify-center">
                                    <i class="fas fa-image text-4xl text-slate-600"></i>
                                </div>
                            @endif
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

    // Category filter logic
    const categoryButtons = document.querySelectorAll('.category-filter');
    const projectCards = document.querySelectorAll('[data-project-category]');

    if (categoryButtons.length && projectCards.length) {
        categoryButtons.forEach(button => {
            button.addEventListener('click', () => {
                const selected = button.getAttribute('data-category-card');

                categoryButtons.forEach(btn => btn.classList.remove('border-purple-500/70', 'active'));
                button.classList.add('border-purple-500/70', 'active');

                projectCards.forEach(card => {
                    const cardCategory = card.getAttribute('data-project-category');

                    if (selected === 'all' || cardCategory === selected) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    }
</script>

@endsection
