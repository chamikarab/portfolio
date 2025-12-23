<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#020617">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>

    <!-- Typography & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <!-- Typed text (hero) -->
    <script src="https://unpkg.com/typed.js@2.0.12/lib/typed.min.js"></script>

    <style>
        .typed-text {
            background: linear-gradient(135deg, #4f46e5 0%, #a855f7 50%, #ec4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
        }
    </style>
</head>
<body class="min-h-screen bg-slate-950 text-slate-50">
    <!-- Global background grid / glow -->
    <div class="pointer-events-none fixed inset-0 -z-10">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(56,189,248,0.08),_transparent_55%),radial-gradient(circle_at_bottom,_rgba(129,140,248,0.18),_transparent_55%)]"></div>
        <div class="absolute inset-0 opacity-40 [mask-image:radial-gradient(circle_at_center,_black,_transparent_70%)]">
            <div class="h-full w-full bg-[linear-gradient(to_right,_rgba(148,163,184,0.08)_1px,_transparent_1px),linear-gradient(to_bottom,_rgba(148,163,184,0.08)_1px,_transparent_1px)] bg-[size:32px_32px]"></div>
        </div>
    </div>

    @include('partials.navbar')

    <main class="full-width-container">
        @yield('content')
    </main>

    @include('partials.footer')

    <script>
        // Defer JS until DOM is ready
        document.addEventListener('DOMContentLoaded', () => {
            const navbar = document.getElementById('navbar');
            const links = document.querySelectorAll('.nav-link');
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const themeToggle = document.getElementById('theme-toggle');

            // Navbar scroll effect
            if (navbar) {
                const handleScroll = () => {
                    if (window.scrollY > 24) {
                        navbar.classList.add('scrolled');
                    } else {
                        navbar.classList.remove('scrolled');
                    }
                };
                handleScroll();
                window.addEventListener('scroll', handleScroll, { passive: true });
            }

            // Active link highlighting on click
            links.forEach(link => {
                link.addEventListener('click', function () {
                    links.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');

                    // Close mobile menu if open
                    if (mobileMenu) {
                        mobileMenu.classList.remove('active');
                    }
                });
            });

            // Highlight active link based on current path
            const currentPath = window.location.pathname;
            links.forEach(link => {
                const href = link.getAttribute('href');
                if (!href) return;
                const linkPath = new URL(href, window.location.origin).pathname;
                if (linkPath === currentPath || (currentPath === '/' && linkPath === '/')) {
                    link.classList.add('active');
                }
            });

            // Mobile menu toggle
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    mobileMenu.classList.toggle('active');
                    const icon = mobileMenuBtn.querySelector('svg');
                    if (!icon) return;
                    if (mobileMenu.classList.contains('active')) {
                        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
                    } else {
                        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>';
                    }
                });

                // Close mobile menu when clicking outside
                document.addEventListener('click', function (event) {
                    if (
                        mobileMenu.classList.contains('active') &&
                        !mobileMenu.contains(event.target) &&
                        !mobileMenuBtn.contains(event.target)
                    ) {
                        mobileMenu.classList.remove('active');
                        const icon = mobileMenuBtn.querySelector('svg');
                        if (icon) {
                            icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>';
                        }
                    }
                });
            }

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    const href = this.getAttribute('href');
                    if (!href || href === '#' || href.length <= 1) return;
                    const target = document.querySelector(href);
                    if (target) {
                        e.preventDefault();
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Theme toggle (light/dark preference hook)
            if (themeToggle) {
                const root = document.documentElement;
                const applyTheme = (mode) => {
                    if (mode === 'light') {
                        root.classList.add('light');
                        root.classList.remove('dark');
                        document.body.classList.remove('bg-slate-950', 'text-slate-50');
                        document.body.classList.add('bg-slate-50', 'text-slate-900');
                    } else {
                        root.classList.add('dark');
                        root.classList.remove('light');
                        document.body.classList.add('bg-slate-950', 'text-slate-50');
                    }
                };

                const stored = window.localStorage.getItem('theme');
                const prefersDark = window.matchMedia &&
                    window.matchMedia('(prefers-color-scheme: dark)').matches;
                const initial = stored || (prefersDark ? 'dark' : 'light');
                applyTheme(initial);

                themeToggle.addEventListener('click', () => {
                    const isDark = root.classList.contains('dark');
                    const next = isDark ? 'light' : 'dark';
                    applyTheme(next);
                    window.localStorage.setItem('theme', next);
                });
            }
        });
    </script>
</body>
</html>
