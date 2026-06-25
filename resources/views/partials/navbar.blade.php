<nav id="navbar" class="fixed inset-x-0 top-2 sm:top-6 z-50 transition-all duration-500">
    <div class="container mx-auto px-8 sm:px-12 lg:px-20">
        <div class="nav-glass mx-auto flex items-center justify-between py-2 px-2 sm:px-3 rounded-full sm:rounded-[2rem] max-w-5xl">
            <!-- Logo Section -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 px-2 group">
                <span class="relative flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-tr from-indigo-600 via-fuchsia-600 to-rose-500 text-sm font-black text-white shadow-xl group-hover:scale-110 transition-transform duration-500">
                    CB
                    <div class="absolute inset-0 rounded-2xl bg-white/20 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                </span>
                <div class="flex flex-col leading-none">
                    <span class="text-[10px] font-black uppercase tracking-[0.3em] text-indigo-400">Portfolio</span>
                    <span class="text-sm font-bold text-white tracking-tight">Chamikara Bandara</span>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <ul class="hidden md:flex items-center gap-1 text-[11px] font-bold uppercase tracking-widest text-slate-400">
                <li>
                    <a href="{{ route('home') }}" class="nav-pill {{ Request::routeIs('home') ? 'nav-item-active text-white' : '' }}">
                        <i class="fa-solid fa-house-chimney"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}" class="nav-pill {{ Request::routeIs('about') ? 'nav-item-active text-white' : '' }}">
                        <i class="fa-solid fa-user-astronaut"></i>
                        <span>About</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('projects.index') }}" class="nav-pill {{ Request::routeIs('projects.*') ? 'nav-item-active text-white' : '' }}">
                        <i class="fa-solid fa-code-fork"></i>
                        <span>Projects</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact') }}" class="nav-pill {{ Request::routeIs('contact') ? 'nav-item-active text-white' : '' }}">
                        <i class="fa-solid fa-satellite-dish"></i>
                        <span>Contact</span>
                    </a>
                </li>
            </ul>

            <!-- Action Hub -->
            <div class="flex items-center gap-2">
                <a href="https://wa.me/message/6FVXAKN5IUQEJ1" target="_blank" rel="noopener noreferrer" class="hidden sm:flex items-center gap-2 px-5 py-2.5 bg-white text-slate-950 text-[11px] font-black uppercase tracking-widest rounded-full hover:scale-105 transition-transform">
                    <span>Hire</span>
                    <div class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></div>
                </a>

                <!-- Mobile Menu Trigger -->
                <button
                    id="mobile-menu-btn"
                    class="md:hidden h-10 w-10 flex items-center justify-center rounded-full bg-white/5 text-white"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu" class="fixed inset-x-4 top-24 z-50 md:hidden invisible opacity-0 translate-y-4 transition-all duration-300">
        <div class="nav-glass rounded-[2rem] p-4 shadow-2xl">
            <ul class="flex flex-col gap-2">
                <li><a href="{{ route('home') }}" class="flex items-center justify-between px-6 py-4 rounded-2xl hover:bg-white/5 text-white font-bold">Home <i class="fa-solid fa-chevron-right text-[10px] text-slate-600"></i></a></li>
                <li><a href="{{ route('about') }}" class="flex items-center justify-between px-6 py-4 rounded-2xl hover:bg-white/5 text-white font-bold">About <i class="fa-solid fa-chevron-right text-[10px] text-slate-600"></i></a></li>
                <li><a href="{{ route('projects.index') }}" class="flex items-center justify-between px-6 py-4 rounded-2xl hover:bg-white/5 text-white font-bold">Projects <i class="fa-solid fa-chevron-right text-[10px] text-slate-600"></i></a></li>
                <li><a href="{{ route('contact') }}" class="flex items-center justify-between px-6 py-4 rounded-2xl hover:bg-white/5 text-white font-bold">Contact <i class="fa-solid fa-chevron-right text-[10px] text-slate-600"></i></a></li>
            </ul>
        </div>
    </div>
</nav>
