<nav id="navbar" class="fixed inset-x-0 top-0 z-50 border-b border-white/5 bg-slate-950/40 backdrop-blur-xl transition-all duration-300">
    <div class="container mx-auto flex items-center justify-between py-3 sm:py-4 px-4 sm:px-6 md:px-8 lg:px-12 relative">
        <a href="{{ route('home') }}" class="logo-link flex items-center gap-2 text-sm sm:text-base font-semibold tracking-tight">
            <span class="inline-flex h-8 w-8 items-center justify-center rounded-2xl bg-gradient-to-tr from-indigo-500 via-fuchsia-500 to-sky-400 text-xs font-bold text-white shadow-lg shadow-indigo-500/40">
                CB
            </span>
            <span class="hidden sm:flex flex-col leading-tight">
                <span class="text-[11px] uppercase tracking-[0.2em] text-slate-400">Portfolio</span>
                <span class="text-sm font-semibold text-slate-50">Chamikara Bandara</span>
            </span>
        </a>

        <ul class="hidden md:flex items-center gap-6 lg:gap-8 text-xs sm:text-sm font-medium">
            <li><a href="{{ route('home') }}" class="nav-link" data-active="home">Home</a></li>
            <li><a href="{{ route('about') }}" class="nav-link" data-active="about">About</a></li>
            <li><a href="{{ route('projects.index') }}" class="nav-link" data-active="projects">Projects</a></li>
            <li><a href="{{ route('contact') }}" class="nav-link" data-active="contact">Contact</a></li>
        </ul>

        <div class="flex items-center gap-2 sm:gap-3">
            <!-- Theme toggle (hooked via JS) -->
            <button
                id="theme-toggle"
                type="button"
                class="hidden sm:inline-flex h-9 w-9 items-center justify-center rounded-full border border-white/10 bg-slate-900/60 text-slate-200 shadow-sm shadow-slate-900/60 transition hover:border-indigo-400/70 hover:text-white"
                aria-label="Toggle theme"
            >
                <span class="sr-only">Toggle theme</span>
                <i class="fa-solid fa-circle-half-stroke text-xs"></i>
            </button>

            <!-- Mobile Menu Button -->
            <button
                id="mobile-menu-btn"
                class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-white/10 bg-slate-900/70 text-slate-100 shadow-sm shadow-slate-900/70 md:hidden"
                aria-label="Toggle menu"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="mobile-menu md:hidden">
        <ul class="flex flex-col space-y-2 text-sm">
            <li><a href="{{ route('home') }}" class="nav-link block rounded-xl px-4 py-3 font-medium" data-active="home">Home</a></li>
            <li><a href="{{ route('about') }}" class="nav-link block rounded-xl px-4 py-3 font-medium" data-active="about">About</a></li>
            <li><a href="{{ route('projects.index') }}" class="nav-link block rounded-xl px-4 py-3 font-medium" data-active="projects">Projects</a></li>
            <li><a href="{{ route('contact') }}" class="nav-link block rounded-xl px-4 py-3 font-medium" data-active="contact">Contact</a></li>
        </ul>
    </div>
</nav>
