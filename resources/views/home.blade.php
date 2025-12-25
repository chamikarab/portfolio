@extends('layouts.app')

@section('title', 'Chamikara Bandara - Portfolio')

@section('content')

<!-- Hero Section -->
<section
    id="hero"
    class="relative min-h-screen flex items-center justify-center overflow-hidden pt-24 sm:pt-28 pb-16 sm:pb-20"
>
    <div class="container mx-auto px-4 sm:px-6 md:px-8 lg:px-12 relative z-10">
        <div class="grid lg:grid-cols-[minmax(0,1.15fr)_minmax(0,0.85fr)] gap-10 lg:gap-14 items-center">
            <div class="text-center lg:text-left space-y-6 sm:space-y-7 fade-in-up order-2 lg:order-1">
                <p class="inline-flex items-center gap-2 rounded-full border border-emerald-400/30 bg-emerald-400/5 px-3 py-1 text-[11px] sm:text-xs font-medium uppercase tracking-[0.25em] text-emerald-200">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400 shadow-[0_0_0_4px_rgba(16,185,129,0.45)]"></span>
                    Available for new projects
                </p>

                <div class="space-y-3 sm:space-y-4">
                    <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-semibold tracking-tight leading-tight">
                        <span class="block text-xs sm:text-sm md:text-base text-slate-300 uppercase tracking-[0.3em] mb-1">Hello, I’m</span>
                        <span class="block gradient-text-accent">Chamikara Bandara</span>
                    </h1>
                    <p class="max-w-xl mx-auto lg:mx-0 text-sm sm:text-base md:text-lg text-slate-300/90">
                        <span class="text-slate-300">I’m a </span>
                        <span class="font-semibold text-slate-100">
                            <span id="typed-text"></span>
                        </span>
                    </p>
                    <p class="max-w-xl mx-auto lg:mx-0 text-xs sm:text-sm md:text-base text-slate-400 leading-relaxed">
                        I design and build web experiences that blend clean code, thoughtful interfaces, and visual storytelling. 
                        With expertise spanning full‑stack development, UI/UX design, graphic design, and video editing, I help 
                        brands and teams turn ideas into polished, user‑focused digital products.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center lg:justify-start items-center">
                    <a href="#contact" class="btn-primary inline-flex items-center justify-center gap-2 text-sm sm:text-base w-full sm:w-auto">
                        <span>Book a collaboration call</span>
                        <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                    </a>
                    <a href="#projects" class="btn-secondary inline-flex items-center justify-center gap-2 text-sm sm:text-base w-full sm:w-auto">
                        <span>Explore selected work</span>
                        <i class="fa-regular fa-circle-play text-xs"></i>
                    </a>
                </div>
            </div>

            <div class="flex justify-center lg:justify-end order-1 lg:order-2 mb-6 lg:mb-0">
                <div class="relative w-56 h-56 sm:w-64 sm:h-64 md:w-72 md:h-72 lg:w-80 lg:h-80">
                    <div class="absolute inset-0 rounded-[2.5rem] bg-gradient-to-br from-indigo-500 via-fuchsia-500 to-sky-400 opacity-30 blur-3xl animate-pulse"></div>
                    <div class="relative h-full w-full rounded-[2.2rem] glass-dark border border-white/10 p-[2px]">
                        <div class="relative h-full w-full overflow-hidden rounded-[2rem] bg-slate-900/80">
                            <img
                                src="{{ asset('chamikara_bandara.PNG') }}"
                                alt="Chamikara Bandara"
                                class="h-full w-full object-cover object-center scale-105"
                            >
                            <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(248,250,252,0.12),_transparent_60%)] mix-blend-soft-light"></div>
                            <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-slate-950/90 via-slate-950/40 to-transparent px-4 pb-4 pt-10">
                                <p class="text-[11px] font-medium uppercase tracking-[0.25em] text-slate-300/80">
                                    Currently crafting with
                                </p>
                                <div class="mt-2 flex flex-wrap gap-1.5 text-[11px] text-slate-200/90">
                                    <span class="inline-flex items-center gap-1 rounded-full bg-slate-900/80 px-2 py-1 border border-white/10">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span> Laravel
                                    </span>
                                    <span class="inline-flex items-center gap-1 rounded-full bg-slate-900/80 px-2 py-1 border border-white/10">
                                        <span class="h-1.5 w-1.5 rounded-full bg-sky-400"></span> Tailwind
                                    </span>
                                    <span class="inline-flex items-center gap-1 rounded-full bg-slate-900/80 px-2 py-1 border border-white/10">
                                        <span class="h-1.5 w-1.5 rounded-full bg-fuchsia-400"></span> React
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
<<<<<<< HEAD
    <div class="absolute bottom-6 sm:bottom-10 left-1/2 -translate-x-1/2 animate-bounce hidden sm:flex flex-col items-center justify-center gap-2 text-[11px] text-slate-400">
=======
    <div class="absolute bottom-6 sm:bottom-10 left-4/2 -translate-x-1/2 animate-bounce hidden sm:flex flex-col items-center gap-2 text-[11px] text-slate-400">
>>>>>>> 521a876 (Update home page layout and styling improvements)
        <span class="uppercase tracking-[0.25em]">Scroll</span>
        <div class="h-9 w-[1px] bg-gradient-to-b from-transparent via-slate-500/70 to-slate-100"></div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-14 sm:py-18 md:py-22 lg:py-28 relative">
    <div class="container mx-auto px-4 sm:px-6 md:px-8 lg:px-12">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-8 sm:mb-10 md:mb-14 fade-in-up">
                <h2 class="section-title mb-3 sm:mb-4 md:mb-5">
                    <span>About</span> <span>Me</span>
                </h2>
                <p class="max-w-2xl mx-auto text-sm sm:text-base text-slate-300">
                    A developer who cares as much about the **feeling** of an interface as the architecture behind it —
                    blending design, code, and systems thinking.
                </p>
            </div>

            <div class="grid gap-6 md:gap-7 lg:gap-8 lg:grid-cols-[minmax(0,1.3fr)_minmax(0,0.9fr)] items-start">
                <!-- Story -->
                <div class="fade-in-up">
                    <div class="glass-dark rounded-3xl border border-white/10 p-6 sm:p-8 md:p-9 shadow-[0_18px_60px_rgba(15,23,42,0.85)]">
                        <p class="text-slate-200 text-sm sm:text-base md:text-lg leading-relaxed mb-4 sm:mb-5">
                            I’m <span class="gradient-text font-semibold">Chamikara Bandara</span>, a full‑stack developer with a soft spot
                            for clean UI and calm experiences. I enjoy turning messy ideas into products that feel obvious to use.
                        </p>
                        <p class="text-slate-300/90 text-sm sm:text-base md:text-lg leading-relaxed mb-4 sm:mb-5">
                            I’ve worked with agencies and product teams on websites, dashboards, and internal tools using
                            Laravel, React, Node, and modern CSS. My favorite projects live at the intersection of brand,
                            interaction, and performance.
                    </p>
                        <p class="text-slate-300/90 text-sm sm:text-base md:text-lg leading-relaxed">
                            Outside of client work, I’m usually refining components, exploring new design patterns, or learning
                            how other teams ship great products. I’m currently open to **remote roles, freelance projects, and long‑term
                            collaborations**.
                        </p>
                        <div class="mt-6 flex flex-wrap gap-3 text-[11px] sm:text-xs text-slate-300/90">
                            <span class="inline-flex items-center gap-2 rounded-full border border-emerald-400/30 bg-emerald-400/5 px-3 py-1.5">
                                <i class="fa-solid fa-heart text-emerald-300 text-xs"></i>
                                Empathy‑first collaboration
                            </span>
                            <span class="inline-flex items-center gap-2 rounded-full border border-sky-400/30 bg-sky-400/5 px-3 py-1.5">
                                <i class="fa-solid fa-gauge-high text-sky-300 text-xs"></i>
                                Performance & accessibility
                            </span>
                            <span class="inline-flex items-center gap-2 rounded-full border border-fuchsia-400/30 bg-fuchsia-400/5 px-3 py-1.5">
                                <i class="fa-solid fa-diagram-project text-fuchsia-300 text-xs"></i>
                                Systems & design thinking
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Snapshot -->
                <div class="fade-in-up">
                    <div class="relative max-w-md mx-auto lg:mx-0">
                        <div class="absolute -inset-6 rounded-[2.5rem] bg-[conic-gradient(from_220deg_at_50%_50%,rgba(129,140,248,0.35),rgba(236,72,153,0.0),rgba(56,189,248,0.4),rgba(236,72,153,0.55),rgba(129,140,248,0.35))] opacity-70 blur-3xl"></div>
                        <div class="relative rounded-[2rem] border border-white/10 bg-slate-950/70 p-5 sm:p-6">
                            <div class="flex items-center gap-4 mb-5">
                                <div class="h-14 w-14 rounded-2xl overflow-hidden border border-white/10">
                                    <img
                                        src="{{ asset('chamikara_bandara.PNG') }}"
                                        alt="Chamikara Bandara"
                                        class="h-full w-full object-cover"
                                    >
                                </div>
                                <div>
                                    <p class="text-xs font-semibold text-slate-100">Chamikara Bandara</p>
                                    <p class="text-[11px] text-slate-400">Full‑Stack Developer · Sri Lanka</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-3 sm:gap-4 mb-4">
                                <div class="rounded-xl bg-slate-900/80 p-3 sm:p-4 border border-white/5">
                                    <p class="text-[11px] font-medium uppercase tracking-[0.24em] text-slate-400 mb-1.5">Focus</p>
                                    <p class="text-xs text-slate-200">
                                        Design‑driven web apps, portfolios, dashboards, and product sites.
                                    </p>
                                </div>
                                <div class="rounded-xl bg-slate-900/80 p-3 sm:p-4 border border-white/5">
                                    <p class="text-[11px] font-medium uppercase tracking-[0.24em] text-slate-400 mb-1.5">Working with</p>
                                    <p class="text-xs text-slate-200">
                                        Laravel, React, Tailwind, Node.js, WordPress.
                                    </p>
                                </div>
                            </div>

                            <div class="rounded-xl bg-slate-900/80 p-3 sm:p-4 border border-white/5 mb-4">
                                <p class="text-[11px] font-medium uppercase tracking-[0.24em] text-slate-400 mb-1.5">Currently</p>
                                <p class="text-xs text-slate-200">
                                    Undergraduate in Information Technology (SLIIT) and working on client projects and personal experiments.
                                </p>
                            </div>

                            <div class="flex flex-wrap gap-2 text-[11px] text-slate-300">
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-900 px-2.5 py-1 border border-white/10">
                                    <i class="fa-solid fa-earth-asia text-slate-400 text-[10px]"></i>
                                    Remote‑friendly
                                </span>
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-900 px-2.5 py-1 border border-white/10">
                                    <i class="fa-solid fa-people-group text-slate-400 text-[10px]"></i>
                                    Enjoys small, focused teams
                                </span>
                            </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Social Proof Section -->
<section class="stats-section relative overflow-hidden py-14 sm:py-18 md:py-22 lg:py-26">
    <div class="absolute inset-0 bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950"></div>
    <div class="container mx-auto px-4 sm:px-6 md:px-8 lg:px-12 relative z-10">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-8 sm:mb-10 md:mb-12 fade-in-up">
                <p class="inline-flex items-center gap-2 rounded-full bg-slate-900/70 border border-slate-600/60 px-3 py-1 text-[11px] font-medium uppercase tracking-[0.24em] text-slate-300 mb-3">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400 shadow-[0_0_0_4px_rgba(16,185,129,0.4)]"></span>
                    Proof of work
                </p>
                <h2 class="text-2xl sm:text-3xl md:text-5xl font-semibold tracking-tight text-slate-50 mb-3">
                    Not just portfolios<br><span class="gradient-text text-xl sm:text-2xl md:text-5xl align-baseline">shipped, lived‑in products</span>
                </h2>
                <p class="max-w-2xl mx-auto text-sm sm:text-base md:text-lg text-slate-200/90">
                    I’ve been helping teams launch, maintain, and iterate on real products for years — from
                    restaurant systems to agency sites and digital brands.
                </p>
            </div>

            <div class="grid gap-5 sm:gap-6 md:gap-7 lg:grid-cols-[1.3fr_minmax(0,1.1fr)] items-start">
                <!-- Stats cards -->
                <div class="grid grid-cols-2 gap-4 sm:gap-5 md:gap-6 fade-in-up">
                    <div class="stat-card glass-dark rounded-2xl p-4 sm:p-5">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[11px] font-medium uppercase tracking-[0.2em] text-slate-400">Experience</span>
                            <i class="fa-solid fa-clock text-slate-400 text-xs"></i>
                        </div>
                        <div class="stat-number counter" data-target="8">0+</div>
                        <p class="text-slate-200 text-xs sm:text-sm mt-1.5">Years crafting digital experiences</p>
                    </div>

                    <div class="stat-card glass-dark rounded-2xl p-4 sm:p-5">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[11px] font-medium uppercase tracking-[0.2em] text-slate-400">Projects</span>
                            <i class="fa-solid fa-layer-group text-slate-400 text-xs"></i>
                        </div>
                        <div class="stat-number counter" data-target="54">0+</div>
                        <p class="text-slate-200 text-xs sm:text-sm mt-1.5">Websites, dashboards & internal tools</p>
                    </div>

                    <div class="stat-card glass-dark rounded-2xl p-4 sm:p-5">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[11px] font-medium uppercase tracking-[0.2em] text-slate-400">Clients</span>
                            <i class="fa-solid fa-user-group text-slate-400 text-xs"></i>
                        </div>
                        <div class="stat-number counter" data-target="24">0+</div>
                        <p class="text-slate-200 text-xs sm:text-sm mt-1.5">Brands, teams, and founders partnered with</p>
                    </div>

                    <div class="stat-card glass-dark rounded-2xl p-4 sm:p-5">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[11px] font-medium uppercase tracking-[0.2em] text-slate-400">Domains</span>
                            <i class="fa-solid fa-globe text-slate-400 text-xs"></i>
                        </div>
                        <div class="stat-number counter" data-target="14">0+</div>
                        <p class="text-slate-200 text-xs sm:text-sm mt-1.5">Industries touched so far</p>
                    </div>
                </div>

                <!-- Testimonial-style blurb -->
                <div class="fade-in-up">
                    <div class="glass-dark rounded-3xl border border-white/10 p-6 sm:p-7 md:p-8 h-full flex flex-col justify-between">
                        <div>
                            <p class="text-[11px] font-medium uppercase tracking-[0.24em] text-emerald-300/80 mb-3">
                                How I usually fit into a team
                            </p>
                            <p class="text-sm sm:text-base md:text-lg text-slate-100 leading-relaxed mb-4">
                                “Chamikara connects design and engineering. He’s comfortable owning a feature from
                                wireframe to production, and cares a lot about polish and performance.”
                            </p>
                            <p class="text-[11px] sm:text-xs text-slate-400">
                                — A typical way collaborators describe how I work on cross‑functional teams
                            </p>
                        </div>
                        <div class="mt-5 flex flex-wrap items-center gap-3 text-[11px] sm:text-xs text-slate-300">
                            <a href="#projects" class="inline-flex items-center gap-1.5 rounded-full bg-slate-900 px-3 py-1 border border-white/10">
                                <i class="fa-solid fa-arrow-trend-up text-[10px] text-emerald-300"></i>
                                See selected work
                            </a>
                            <a href="#contact" class="inline-flex items-center gap-1.5 rounded-full bg-emerald-500/10 px-3 py-1 border border-emerald-400/40 text-emerald-200">
                                <i class="fa-solid fa-calendar-days text-[10px]"></i>
                                Book a collaboration chat
                            </a>
                        </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-14 sm:py-18 md:py-22 lg:py-28 relative">
    <div class="container mx-auto px-4 sm:px-6 md:px-8 lg:px-12">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-8 sm:mb-10 md:mb-14 fade-in-up">
                <h2 class="section-title mb-3 sm:mb-4 md:mb-5">
                    <span>How</span> <span>I Help</span>
                </h2>
                <p class="max-w-2xl mx-auto text-sm sm:text-base text-slate-300">
                    From first idea to live product, I plug into your team where it matters most — strategy, design,
                    engineering, or all three.
                </p>
            </div>

            <div class="grid gap-6 sm:gap-7 md:gap-8 md:grid-cols-3">
                <!-- Service 1 -->
                <article class="glass-dark rounded-3xl border border-white/10 p-6 sm:p-7 fade-in-up flex flex-col">
                    <div class="flex items-start justify-between gap-3 mb-4">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-indigo-500/20 text-indigo-200">
                                <i class="fas fa-code text-sm"></i>
                            </span>
                            <div>
                                <p class="text-[11px] font-medium uppercase tracking-[0.22em] text-indigo-300/80">01 · Build</p>
                                <h3 class="text-sm sm:text-base md:text-lg font-semibold text-slate-50">
                                    Product‑grade web apps
                                </h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed flex-1">
                        Designing and building full‑stack web apps with Laravel, React, and modern tooling — from MVPs to
                        long‑running products. I focus on clear architectures, readable components, and maintainable code.
                    </p>
                    <ul class="mt-4 space-y-1.5 text-[11px] sm:text-xs text-slate-400">
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                            Feature implementation & refactors
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                            Dashboards, portals, internal tools
                        </li>
                    </ul>
                </article>

                <!-- Service 2 -->
                <article class="glass-dark rounded-3xl border border-white/10 p-6 sm:p-7 fade-in-up flex flex-col">
                    <div class="flex items-start justify-between gap-3 mb-4">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-fuchsia-500/20 text-fuchsia-200">
                                <i class="fas fa-pen-nib text-sm"></i>
                            </span>
                            <div>
                                <p class="text-[11px] font-medium uppercase tracking-[0.22em] text-fuchsia-300/80">02 · Design</p>
                                <h3 class="text-sm sm:text-base md:text-lg font-semibold text-slate-50">
                                    Interfaces & experience
                                </h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed flex-1">
                        Turning goals and content into clear, expressive interfaces — from wireframes to high‑fidelity
                        UI. I design systems that scale: components, tokens, and patterns that stay consistent.
                    </p>
                    <ul class="mt-4 space-y-1.5 text-[11px] sm:text-xs text-slate-400">
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                            UX flows, wireframes, and UI design
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                            Design systems & component libraries
                        </li>
                    </ul>
                </article>

                <!-- Service 3 -->
                <article class="glass-dark rounded-3xl border border-white/10 p-6 sm:p-7 fade-in-up flex flex-col">
                    <div class="flex items-start justify-between gap-3 mb-4">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-emerald-500/20 text-emerald-200">
                                <i class="fas fa-diagram-project text-sm"></i>
                            </span>
                            <div>
                                <p class="text-[11px] font-medium uppercase tracking-[0.22em] text-emerald-300/80">03 · Systems</p>
                                <h3 class="text-sm sm:text-base md:text-lg font-semibold text-slate-50">
                                    Systems, APIs & optimisation
                                </h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed flex-1">
                        Designing the glue that keeps products healthy: APIs, data models, performance, and automation.
                        I help simplify complexity so teams can ship faster without losing quality.
                    </p>
                    <ul class="mt-4 space-y-1.5 text-[11px] sm:text-xs text-slate-400">
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                            REST APIs, integrations, and auth
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                            Performance passes & cleanup phases
                        </li>
                    </ul>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="py-14 sm:py-18 md:py-22 lg:py-28 relative bg-gray-900/40">
    <div class="container mx-auto px-4 sm:px-6 md:px-8 lg:px-12">
        <h2 class="section-title fade-in-up mb-8 sm:mb-12 md:mb-16">
            <span>My</span> <span>Projects</span>
        </h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-7 md:gap-8">
            @forelse ($projects as $project)
                <div class="project-card-modern fade-in-up">
                    <div class="overflow-hidden rounded-t-2xl">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}" 
                             class="w-full h-48 object-cover">
                    </div>
                    <div class="p-4 sm:p-6">
                        <h3 class="text-lg sm:text-xl font-semibold mb-2 sm:mb-3 text-white">{{ $project->name }}</h3>
                        <p class="text-gray-400 text-sm sm:text-base mb-3 sm:mb-4 leading-relaxed">{{ Str::limit($project->description, 100) }}</p>
                        <a href="{{ route('projects.show', $project->id) }}" 
                           class="text-purple-400 hover:text-purple-300 font-semibold text-sm sm:text-base transition-colors duration-300 inline-flex items-center">
                            View Project <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-400 text-lg">No projects available at the moment.</p>
                </div>
            @endforelse
        </div>
        <div class="text-center mt-8 sm:mt-10 md:mt-12">
            <a href="/projects" class="btn-secondary">View All Projects</a>
        </div>
    </div>
</section>

<!-- Education Section -->
<section id="education" class="py-14 sm:py-18 md:py-22 lg:py-26 relative">
    <div class="container mx-auto px-4 sm:px-6 md:px-8 lg:px-12">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-8 sm:mb-10 md:mb-14 fade-in-up">
                <h2 class="section-title mb-3 sm:mb-4 md:mb-5">
            <span>My</span> <span>Education</span>
        </h2>
                <p class="max-w-2xl mx-auto text-sm sm:text-base text-slate-300">
                    A brief timeline of the studies and certifications that shaped how I think about technology and problem‑solving.
                </p>
            </div>

            <div class="grid gap-4 sm:gap-5 md:gap-6 md:grid-cols-2">
                <!-- O/L -->
                <article class="timeline-item glass-dark rounded-2xl sm:rounded-3xl p-4 sm:p-5 border border-white/10 fade-in-up">
                    <div class="flex items-center justify-between gap-3 mb-3">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-gradient-to-tr from-emerald-500 to-sky-500 text-white">
                                <i class="fas fa-certificate text-xs sm:text-sm"></i>
                            </span>
                            <div>
                                <p class="text-xs sm:text-sm font-semibold text-slate-50">G.C.E Ordinary Level</p>
                                <p class="text-[11px] sm:text-xs text-slate-400">
                                    Kingswood College, Kandy
                                </p>
                            </div>
                    </div>
                        <span class="inline-flex items-center rounded-full bg-slate-800/80 px-2.5 py-1 text-[10px] font-medium text-slate-200 border border-slate-500/60 whitespace-nowrap">
                            2017
                        </span>
                    </div>
                    <p class="text-[11px] sm:text-xs text-slate-400 leading-relaxed">
                        Built a strong foundation in core subjects and first explored computers and technology.
                    </p>
                </article>

                <!-- Diploma -->
                <article class="timeline-item glass-dark rounded-2xl sm:rounded-3xl p-4 sm:p-5 border border-white/10 fade-in-up">
                    <div class="flex items-center justify-between gap-3 mb-3">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-gradient-to-tr from-sky-500 to-indigo-500 text-white">
                                <i class="fas fa-graduation-cap text-xs sm:text-sm"></i>
                            </span>
                            <div>
                                <p class="text-xs sm:text-sm font-semibold text-slate-50">
                                    Diploma in PC Hardware Engineering & Network Administration
                                </p>
                                <p class="text-[11px] sm:text-xs text-slate-400">
                                    Esoft Metro Campus, Kandy
                                </p>
                </div>
            </div>
                        <span class="inline-flex items-center rounded-full bg-slate-800/80 px-2.5 py-1 text-[10px] font-medium text-slate-200 border border-slate-500/60 whitespace-nowrap">
                            2018
                        </span>
                    </div>
                    <p class="text-[11px] sm:text-xs text-slate-400 leading-relaxed">
                        Learned how computers and networks work under the hood, which still helps when building and deploying systems.
                    </p>
                </article>

                <!-- A/L -->
                <article class="timeline-item glass-dark rounded-2xl sm:rounded-3xl p-4 sm:p-5 border border-white/10 fade-in-up">
                    <div class="flex items-center justify-between gap-3 mb-3">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-gradient-to-tr from-amber-500 to-rose-500 text-white">
                                <i class="fas fa-certificate text-xs sm:text-sm"></i>
                            </span>
                            <div>
                                <p class="text-xs sm:text-sm font-semibold text-slate-50">G.C.E Advanced Level</p>
                                <p class="text-[11px] sm:text-xs text-slate-400">
                                    Kingswood College, Kandy
                                </p>
                            </div>
                        </div>
                        <span class="inline-flex items-center rounded-full bg-slate-800/80 px-2.5 py-1 text-[10px] font-medium text-slate-200 border border-slate-500/60 whitespace-nowrap">
                            2020
                        </span>
                    </div>
                    <p class="text-[11px] sm:text-xs text-slate-400 leading-relaxed">
                        Deepened analytical thinking and discipline, which now feeds directly into how I approach engineering work.
                    </p>
                </article>

                <!-- Undergraduate -->
                <article class="timeline-item glass-dark rounded-2xl sm:rounded-3xl p-4 sm:p-5 border border-white/10 fade-in-up">
                    <div class="flex items-center justify-between gap-3 mb-3">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-gradient-to-tr from-purple-500 to-indigo-500 text-white">
                                <i class="fas fa-user-graduate text-xs sm:text-sm"></i>
                            </span>
                            <div>
                                <p class="text-xs sm:text-sm font-semibold text-slate-50">
                                    BSc (Hons) in Information Technology · Undergraduate
                                </p>
                                <p class="text-[11px] sm:text-xs text-slate-400">
                                    Sri Lanka Institute of Information Technology (SLIIT)
                                </p>
                </div>
            </div>
                        <span class="inline-flex items-center rounded-full bg-emerald-500/15 px-2.5 py-1 text-[10px] font-medium text-emerald-200 border border-emerald-400/60 whitespace-nowrap">
                            2022 – Present
                        </span>
                    </div>
                    <p class="text-[11px] sm:text-xs text-slate-400 leading-relaxed">
                        Currently formalizing my knowledge across software engineering, networking, and modern technologies while
                        building real‑world projects alongside my studies.
                    </p>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- Experience Section -->
<section id="experience" class="py-14 sm:py-18 md:py-22 lg:py-26 relative bg-gray-900/35">
    <div class="container mx-auto px-4 sm:px-6 md:px-8 lg:px-12">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-8 sm:mb-10 md:mb-14 fade-in-up">
                <h2 class="section-title mb-3 sm:mb-4 md:mb-5">
            <span>My</span> <span>Experience</span>
        </h2>
                <p class="max-w-2xl mx-auto text-sm sm:text-base text-slate-300">
                    Roles where I’ve blended design, development, and systems thinking to support teams and ship real products.
                </p>
            </div>

            <div class="space-y-5 sm:space-y-6 md:space-y-7">
                <!-- Candea Digital -->
                <article class="timeline-item glass-dark rounded-2xl sm:rounded-3xl p-4 sm:p-5 md:p-6 border border-white/10 fade-in-up">
                    <div class="flex items-start justify-between gap-3 mb-3">
                        <div class="flex items-start gap-3">
                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-r from-emerald-500 to-sky-500 text-white">
                                <i class="fas fa-network-wired text-sm"></i>
                            </span>
                            <div>
                                <p class="text-xs font-semibold text-slate-100">IT System Administrator</p>
                                <p class="text-[11px] sm:text-xs text-slate-400">
                                    Candea Digital (Pvt) Ltd · Full Time
                                </p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-[11px] font-medium text-slate-300">2024 – Present</p>
                            <span class="mt-1 inline-flex items-center rounded-full bg-emerald-400/10 px-2.5 py-1 text-[10px] font-medium text-emerald-300 border border-emerald-400/40 whitespace-nowrap">
                                vahana.lk project
                            </span>
                        </div>
                    </div>
                    <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                        Managing and monitoring the infrastructure behind <span class="font-semibold text-slate-100">vahana.lk</span>,
                        including servers, deployments, and day‑to‑day system health. I work closely with the development team to
                        keep the platform secure, performant, and reliable while helping troubleshoot production issues and
                        streamline DevOps workflows.
                    </p>
                </article>

                <!-- Refectline -->
                <article class="timeline-item glass-dark rounded-2xl sm:rounded-3xl p-4 sm:p-5 md:p-6 border border-white/10 fade-in-up">
                    <div class="flex items-start justify-between gap-3 mb-3">
                        <div class="flex items-start gap-3">
                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-r from-indigo-500 to-fuchsia-500 text-white">
                                <i class="fas fa-briefcase text-sm"></i>
                            </span>
                            <div>
                                <p class="text-xs font-semibold text-slate-100">Web Developer</p>
                                <p class="text-[11px] sm:text-xs text-slate-400">
                                    Refectline (Pvt) Ltd · Full Time
                                </p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-[11px] font-medium text-slate-300">2020 – 2022</p>
                            <span class="mt-1 inline-flex items-center rounded-full bg-emerald-400/10 px-2.5 py-1 text-[10px] font-medium text-emerald-300 border border-emerald-400/40 whitespace-nowrap">
                                Web & WordPress
                            </span>
                        </div>
                    </div>
                    <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                        Built and maintained marketing sites and landing pages in WordPress and PHP, while also creating visuals,
                        posts, and video content for campaigns. Gradually introduced Laravel and modern JavaScript practices to
                        improve performance, maintainability, and handoff between design and development.
                    </p>
                </article>

                <!-- HQ Restaurant -->
                <article class="timeline-item glass-dark rounded-2xl sm:rounded-3xl p-4 sm:p-5 md:p-6 border border-white/10 fade-in-up">
                    <div class="flex items-start justify-between gap-3 mb-3">
                        <div class="flex items-start gap-3">
                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-r from-sky-500 to-indigo-500 text-white">
                                <i class="fas fa-laptop-code text-sm"></i>
                            </span>
                            <div>
                                <p class="text-xs font-semibold text-slate-100">System Maintainer & IT Operator</p>
                                <p class="text-[11px] sm:text-xs text-slate-400">
                                    HQ Restaurant · Part Time
                                </p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-[11px] font-medium text-slate-300">2017 – 2020</p>
                            <span class="mt-1 inline-flex items-center rounded-full bg-sky-400/10 px-2.5 py-1 text-[10px] font-medium text-sky-300 border border-sky-400/40 whitespace-nowrap">
                                IT operations
                            </span>
                        </div>
                    </div>
                    <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                        Maintained core IT systems and billing software, troubleshooting issues in a live environment and keeping
                        operations stable. Also contributed digital content for promotions, which helped me understand how
                        infrastructure, tools, and user‑facing experiences fit together.
                    </p>
                </article>

                <!-- Recode99 -->
                <article class="timeline-item glass-dark rounded-2xl sm:rounded-3xl p-4 sm:p-5 md:p-6 border border-white/10 fade-in-up">
                    <div class="flex items-start justify-between gap-3 mb-3">
                        <div class="flex items-start gap-3">
                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-r from-fuchsia-500 to-rose-500 text-white">
                                <i class="fas fa-palette text-sm"></i>
                            </span>
                            <div>
                                <p class="text-xs font-semibold text-slate-100">Web Developer & Graphic Designer</p>
                                <p class="text-[11px] sm:text-xs text-slate-400">
                                    Recode99 (Pvt) Ltd · Part Time
                                </p>
                </div>
            </div>
                        <div class="text-right">
                            <p class="text-[11px] font-medium text-slate-300">2017 – 2019</p>
                            <span class="mt-1 inline-flex items-center rounded-full bg-fuchsia-400/10 px-2.5 py-1 text-[10px] font-medium text-fuchsia-300 border border-fuchsia-400/40 whitespace-nowrap">
                                Design & web
                            </span>
                    </div>
                    </div>
                    <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                        Started with social media graphics and video editing, then took on building and maintaining WordPress
                        sites for clients. This role is where I first connected visual design, content, and code into cohesive
                        digital experiences.
                    </p>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="py-14 sm:py-18 md:py-22 lg:py-28 relative">
    <div class="container mx-auto px-4 sm:px-6 md:px-8 lg:px-12">
        <div class="flex flex-col items-center text-center gap-4 sm:gap-5 mb-8 sm:mb-10 md:mb-12">
            <div class="fade-in-up">
                <h2 class="section-title mb-3 sm:mb-4 md:mb-5">
            <span>My</span> <span>Skills</span>
        </h2>
                <p class="max-w-xl mx-auto text-sm sm:text-base text-slate-200/90">
                    A snapshot of the tools and technologies I use most often — from interface craft to backend systems
                    and the workflow glue that holds everything together.
                </p>
            </div>
            <div class="flex flex-wrap justify-center gap-3 text-[11px] sm:text-xs text-slate-300/90 fade-in-up">
                <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-400/10 px-3 py-1 border border-emerald-400/40">
                    <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                    Primary stack
                </span>
                <span class="inline-flex items-center gap-1.5 rounded-full bg-sky-400/10 px-3 py-1 border border-sky-400/40">
                    <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                    Production experience
                </span>
                <span class="inline-flex items-center gap-1.5 rounded-full bg-fuchsia-400/10 px-3 py-1 border border-fuchsia-400/40">
                    <span class="h-2 w-2 rounded-full bg-fuchsia-400"></span>
                    Exploring & refining
                </span>
            </div>
        </div>

        <div class="grid gap-6 md:gap-7 lg:gap-9 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 max-w-7xl mx-auto">
            <!-- Frontend Column -->
            <div class="glass-dark rounded-3xl border border-white/10 p-5 sm:p-6 fade-in-up">
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <p class="text-[11px] font-medium uppercase tracking-[0.24em] text-emerald-300/80">Frontend</p>
                        <h3 class="text-sm sm:text-base font-semibold text-slate-50 mt-1">Interfaces & user experience</h3>
                    </div>
                    <div class="h-9 w-9 rounded-full bg-gradient-to-tr from-emerald-400/30 to-sky-400/40 flex items-center justify-center text-emerald-100 border border-emerald-400/40">
                        <i class="fas fa-magic text-xs"></i>
                    </div>
                </div>

                <ul class="space-y-3.5">
                    <li class="flex items-center justify-between gap-3 rounded-2xl bg-slate-950/40 px-3 py-2.5 border border-white/5">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-orange-500/15">
                                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg"
                                     alt="HTML5"
                                     class="h-5 w-5 sm:h-6 sm:w-6">
                            </span>
                            <div>
                                <p class="text-xs font-semibold text-slate-50">HTML</p>
                                <p class="text-[11px] text-slate-400">Semantic, accessible markup</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center rounded-full bg-emerald-400/10 px-2.5 py-1 text-[10px] font-medium text-emerald-300 border border-emerald-400/40">
                            Primary
                        </span>
                    </li>

                    <li class="flex items-center justify-between gap-3 rounded-2xl bg-slate-950/40 px-3 py-2.5 border border-white/5">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-blue-500/15">
                                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg"
                                     alt="CSS3"
                                     class="h-5 w-5 sm:h-6 sm:w-6">
                            </span>
                            <div>
                                <p class="text-xs font-semibold text-slate-50">CSS</p>
                                <p class="text-[11px] text-slate-400">Utility‑first, responsive, animations</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center rounded-full bg-emerald-400/10 px-2.5 py-1 text-[10px] font-medium text-emerald-300 border border-emerald-400/40">
                            Primary
                        </span>
                    </li>

                    <li class="flex items-center justify-between gap-3 rounded-2xl bg-slate-950/40 px-3 py-2.5 border border-white/5">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-yellow-500/15">
                                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg"
                                     alt="JavaScript"
                                     class="h-5 w-5 sm:h-6 sm:w-6">
                            </span>
                            <div>
                                <p class="text-xs font-semibold text-slate-50">JavaScript</p>
                                <p class="text-[11px] text-slate-400">Interactions, state, async flows</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center rounded-full bg-sky-400/10 px-2.5 py-1 text-[10px] font-medium text-sky-300 border border-sky-400/40 whitespace-nowrap">
                            In production
                        </span>
                    </li>

                    <li class="flex items-center justify-between gap-3 rounded-2xl bg-slate-950/40 px-3 py-2.5 border border-white/5">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-sky-500/15">
                                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg"
                                     alt="React"
                                     class="h-5 w-5 sm:h-6 sm:w-6">
                            </span>
                            <div>
                                <p class="text-xs font-semibold text-slate-50">React</p>
                                <p class="text-[11px] text-slate-400">Component‑driven UIs</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center rounded-full bg-sky-400/10 px-2.5 py-1 text-[10px] font-medium text-sky-300 border border-sky-400/40 whitespace-nowrap">
                            In production
                        </span>
                    </li>

                    <li class="flex items-center justify-between gap-3 rounded-2xl bg-slate-950/40 px-3 py-2.5 border border-white/5">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-pink-500/15">
                                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg"
                                     alt="Figma"
                                     class="h-5 w-5 sm:h-6 sm:w-6">
                            </span>
                            <div>
                                <p class="text-xs font-semibold text-slate-50">Figma</p>
                                <p class="text-[11px] text-slate-400">Wireframes & design systems</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center rounded-full bg-fuchsia-400/10 px-2.5 py-1 text-[10px] font-medium text-fuchsia-300 border border-fuchsia-400/40">
                            Exploring
                        </span>
                    </li>
                </ul>
            </div>

            <!-- Backend Column -->
            <div class="glass-dark rounded-3xl border border-white/10 p-5 sm:p-6 fade-in-up">
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <p class="text-[11px] font-medium uppercase tracking-[0.24em] text-sky-300/80">Backend</p>
                        <h3 class="text-sm sm:text-base font-semibold text-slate-50 mt-1">APIs, data & business logic</h3>
                    </div>
                    <div class="h-9 w-9 rounded-full bg-gradient-to-tr from-sky-400/30 to-indigo-400/40 flex items-center justify-center text-sky-100 border border-sky-400/40">
                        <i class="fas fa-database text-xs"></i>
                    </div>
                </div>

                <ul class="space-y-3.5">
                    <li class="flex items-center justify-between gap-3 rounded-2xl bg-slate-950/40 px-3 py-2.5 border border-white/5">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-sky-500/15">
                                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg"
                                     alt="PHP"
                                     class="h-5 w-5 sm:h-6 sm:w-6">
                            </span>
                            <div>
                                <p class="text-xs font-semibold text-slate-50">PHP</p>
                                <p class="text-[11px] text-slate-400">APIs, controllers, business rules</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center rounded-full bg-sky-400/10 px-2.5 py-1 text-[10px] font-medium text-sky-300 border border-sky-400/40 whitespace-nowrap">
                            In production
                        </span>
                    </li>

                    <li class="flex items-center justify-between gap-3 rounded-2xl bg-slate-950/40 px-3 py-2.5 border border-white/5">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-red-500/15">
                                <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/laravel/laravel-plain.svg"
                                     alt="Laravel"
                                     class="h-5 w-5 sm:h-6 sm:w-6">
                            </span>
                            <div>
                                <p class="text-xs font-semibold text-slate-50">Laravel</p>
                                <p class="text-[11px] text-slate-400">REST APIs, auth, dashboards</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center rounded-full bg-emerald-400/10 px-2.5 py-1 text-[10px] font-medium text-emerald-300 border border-emerald-400/40">
                            Primary
                        </span>
                    </li>

                    <li class="flex items-center justify-between gap-3 rounded-2xl bg-slate-950/40 px-3 py-2.5 border border-white/5">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-emerald-500/15">
                                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg"
                                     alt="Node.js"
                                     class="h-5 w-5 sm:h-6 sm:w-6">
                            </span>
                            <div>
                                <p class="text-xs font-semibold text-slate-50">Node.js & Express</p>
                                <p class="text-[11px] text-slate-400">APIs & services</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center rounded-full bg-sky-400/10 px-2.5 py-1 text-[10px] font-medium text-sky-300 border border-sky-400/40">
                            In production
                        </span>
                    </li>

                    <li class="flex items-center justify-between gap-3 rounded-2xl bg-slate-950/40 px-3 py-2.5 border border-white/5">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-blue-500/15">
                                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg"
                                     alt="MySQL"
                                     class="h-5 w-5 sm:h-6 sm:w-6">
                            </span>
                            <div>
                                <p class="text-xs font-semibold text-slate-50">MySQL & SQL Server</p>
                                <p class="text-[11px] text-slate-400">Relational schema & queries</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center rounded-full bg-sky-400/10 px-2.5 py-1 text-[10px] font-medium text-sky-300 border border-sky-400/40">
                            In production
                        </span>
                    </li>

                    <li class="flex items-center justify-between gap-3 rounded-2xl bg-slate-950/40 px-3 py-2.5 border border-white/5">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-emerald-500/15">
                                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mongodb/mongodb-original.svg"
                                     alt="MongoDB"
                                     class="h-5 w-5 sm:h-6 sm:w-6">
                            </span>
                            <div>
                                <p class="text-xs font-semibold text-slate-50">MongoDB</p>
                                <p class="text-[11px] text-slate-400">Document‑based data models</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center rounded-full bg-fuchsia-400/10 px-2.5 py-1 text-[10px] font-medium text-fuchsia-300 border border-fuchsia-400/40">
                            Exploring
                        </span>
                    </li>
                </ul>
            </div>

            <!-- Tooling Column -->
            <div class="glass-dark rounded-3xl border border-white/10 p-5 sm:p-6 fade-in-up">
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <p class="text-[11px] font-medium uppercase tracking-[0.24em] text-fuchsia-300/80">Tooling</p>
                        <h3 class="text-sm sm:text-base font-semibold text-slate-50 mt-1">Workflow, platform & ops</h3>
                    </div>
                    <div class="h-9 w-9 rounded-full bg-gradient-to-tr from-fuchsia-400/30 to-amber-400/40 flex items-center justify-center text-fuchsia-100 border border-fuchsia-400/40">
                        <i class="fas fa-compass-drafting text-xs"></i>
                    </div>
            </div>

                <ul class="space-y-3.5">
                    <li class="flex items-center justify-between gap-3 rounded-2xl bg-slate-950/40 px-3 py-2.5 border border-white/5">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-slate-700/70">
                                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg"
                                     alt="GitHub"
                                     class="h-5 w-5 sm:h-6 sm:w-6">
                            </span>
                            <div>
                                <p class="text-xs font-semibold text-slate-50">Git & GitHub</p>
                                <p class="text-[11px] text-slate-400">Version control & collaboration</p>
            </div>
            </div>
                        <span class="inline-flex items-center rounded-full bg-emerald-400/10 px-2.5 py-1 text-[10px] font-medium text-emerald-300 border border-emerald-400/40">
                            Primary
                        </span>
                    </li>

                    <li class="flex items-center justify-between gap-3 rounded-2xl bg-slate-950/40 px-3 py-2.5 border border-white/5">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-sky-500/20">
                                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/wordpress/wordpress-plain.svg"
                                     alt="WordPress"
                                     class="h-5 w-5 sm:h-6 sm:w-6">
                            </span>
                            <div>
                                <p class="text-xs font-semibold text-slate-50">WordPress</p>
                                <p class="text-[11px] text-slate-400">Custom themes & CMS setups</p>
            </div>
            </div>
                        <span class="inline-flex items-center rounded-full bg-sky-400/10 px-2.5 py-1 text-[10px] font-medium text-sky-300 border border-sky-400/40">
                            In production
                        </span>
                    </li>

                    <li class="flex items-center justify-between gap-3 rounded-2xl bg-slate-950/40 px-3 py-2.5 border border-white/5">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-slate-600/60 text-slate-100">
                                <i class="fas fa-terminal text-lg"></i>
                            </span>
                            <div>
                                <p class="text-xs font-semibold text-slate-50">CLI & automation</p>
                                <p class="text-[11px] text-slate-400">Dev tooling & scripts</p>
            </div>
            </div>
                        <span class="inline-flex items-center rounded-full bg-sky-400/10 px-2.5 py-1 text-[10px] font-medium text-sky-300 border border-sky-400/40">
                            In production
                        </span>
                    </li>

                    <li class="flex items-center justify-between gap-3 rounded-2xl bg-slate-950/40 px-3 py-2.5 border border-white/5">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-indigo-500/20 text-indigo-200">
                                <i class="fas fa-layer-group text-lg"></i>
                            </span>
                            <div>
                                <p class="text-xs font-semibold text-slate-50">Component systems</p>
                                <p class="text-[11px] text-slate-400">Reusable UI libraries</p>
            </div>
            </div>
                        <span class="inline-flex items-center rounded-full bg-fuchsia-400/10 px-2.5 py-1 text-[10px] font-medium text-fuchsia-300 border border-fuchsia-400/40">
                            Exploring
                        </span>
                    </li>

                    <li class="flex items-center justify-between gap-3 rounded-2xl bg-slate-950/40 px-3 py-2.5 border border-white/5">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-emerald-500/20 text-emerald-200">
                                <i class="fas fa-gauge-high text-lg"></i>
                            </span>
                            <div>
                                <p class="text-xs font-semibold text-slate-50">Performance & monitoring</p>
                                <p class="text-[11px] text-slate-400">Lighthouse, bundle analysis</p>
            </div>
            </div>
                        <span class="inline-flex items-center rounded-full bg-emerald-400/10 px-2.5 py-1 text-[10px] font-medium text-emerald-300 border border-emerald-400/40">
                            Primary
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<script>
    // Typed.js initialization for hero subtitle
    if (document.getElementById('typed-text')) {
        new Typed('#typed-text', {
            strings: [
                "Web Developer",
                "Software Developer",
                "Video Editor",
                "Graphic Designer",
                "UI/UX Designer"
            ],
            typeSpeed: 60,
            backSpeed: 35,
            loop: true,
            backDelay: 2000,
            smartBackspace: true,
        });
    }

    // Counter animation
    function animateCounter(counter) {
        const target = +counter.getAttribute('data-target');
        const increment = target / 80;
        let currentValue = 0;

        const updateCounter = () => {
            currentValue += increment;
            if (currentValue < target) {
                counter.innerText = `${Math.ceil(currentValue)}+`;
                setTimeout(updateCounter, 10);
            } else {
                counter.innerText = `${target}+`;
            }
        };
        updateCounter();
    }

    const counters = document.querySelectorAll('.counter');
    const observerOptions = {
        root: null,
        threshold: 0.5,
    };

    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                counterObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);

    counters.forEach(counter => {
        counterObserver.observe(counter);
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

    // Video playback rate
    document.addEventListener("DOMContentLoaded", function () {
        const video = document.getElementById("bg-video");
        if (video) {
            video.playbackRate = 0.7;
        }
    });
</script>

@endsection
