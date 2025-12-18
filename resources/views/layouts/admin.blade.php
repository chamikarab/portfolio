<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#020617">
    <title>@yield('title') • Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Typography & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <!-- Admin-specific styles (plain CSS so they work without Tailwind @apply) -->
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        .admin-glow-bg {
            background-image:
                radial-gradient(circle at top, rgba(56, 189, 248, 0.10), transparent 55%),
                radial-gradient(circle at bottom, rgba(129, 140, 248, 0.18), transparent 55%);
        }

        .admin-card {
            position: relative;
            border-radius: 1.25rem;
            border: 1px solid rgba(148, 163, 184, 0.35);
            background:
                radial-gradient(circle at top left, rgba(59, 130, 246, 0.14), transparent 55%),
                radial-gradient(circle at bottom right, rgba(45, 212, 191, 0.12), transparent 55%),
                linear-gradient(to bottom right, #f9fafb, #e5e7eb);
            box-shadow:
                0 18px 40px rgba(15, 23, 42, 0.12),
                0 0 0 1px rgba(255, 255, 255, 0.6) inset;
            backdrop-filter: blur(14px);
            padding: 1.5rem;
        }

        .admin-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .admin-card-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: #111827;
        }

        .admin-page-title {
            font-size: 1.25rem;
            font-weight: 600;
            letter-spacing: -0.02em;
            color: #111827;
        }

        @media (min-width: 768px) {
            .admin-page-title {
                font-size: 1.5rem;
            }
        }

        .admin-page-subtitle {
            margin-top: 0.25rem;
            font-size: 0.875rem;
            color: #6b7280;
        }

        .admin-btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border-radius: 9999px;
            background-color: #4f46e5;
            color: #ffffff;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.35);
            border: none;
            cursor: pointer;
            transition: all 0.15s ease-out;
        }

        .admin-btn-primary:hover {
            background-color: #818cf8;
            transform: translateY(-1px);
            box-shadow: 0 14px 35px rgba(79, 70, 229, 0.5);
        }

        .admin-btn-ghost {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border-radius: 9999px;
            border: 1px solid #d1d5db;
            background-color: #ffffff;
            color: #374151;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.375rem 0.75rem;
            cursor: pointer;
            transition: all 0.15s ease-out;
        }

        .admin-btn-ghost:hover {
            border-color: #9ca3af;
            background-color: #f9fafb;
            color: #111827;
        }

        .admin-badge-pill {
            display: inline-flex;
            align-items: center;
            border-radius: 9999px;
            background-color: #f3f4f6;
            padding: 0.25rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 500;
            color: #374151;
            border: 1px solid #e5e7eb;
        }

        .admin-chip-muted {
            display: inline-flex;
            align-items: center;
            border-radius: 9999px;
            background-color: #f3f4f6;
            padding: 0.25rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 500;
            color: #6b7280;
        }

        .admin-table {
            min-width: 100%;
            text-align: left;
            font-size: 0.875rem;
            color: #111827;
            border-collapse: separate;
            border-spacing: 0;
        }

        .admin-table thead {
            background-image: linear-gradient(to right, #eef2ff, #e0f2fe);
        }

        .admin-table thead th {
            position: sticky;
            top: 0;
            z-index: 1;
        }

        .admin-table th {
            padding: 0.75rem 1rem;
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #4b5563;
            border-bottom: 1px solid #e5e7eb;
            white-space: nowrap;
        }

        .admin-table th:first-child {
            border-top-left-radius: 0.75rem;
        }

        .admin-table th:last-child {
            border-top-right-radius: 0.75rem;
        }

        .admin-table td {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: top;
        }

        .admin-table tbody tr:hover {
            background-image: linear-gradient(to right, #eff6ff, #ecfeff);
            transition: background-image 0.15s ease-out;
        }

        .admin-table-actions {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .admin-form-control {
            margin-top: 0.25rem;
            display: block;
            width: 100%;
            border-radius: 0.75rem;
            border: 1px solid #d1d5db;
            background-color: #ffffff;
            padding: 0.6rem 0.75rem;
            font-size: 0.875rem;
            color: #111827;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.6);
            outline: none;
            transition: all 0.15s ease-out;
        }

        .admin-form-control::placeholder {
            color: #64748b;
        }

        .admin-form-control:focus {
            border-color: #818cf8;
            box-shadow: 0 0 0 1px rgba(129, 140, 248, 0.5);
        }

        .admin-alert-success {
            margin-bottom: 1rem;
            border-radius: 0.75rem;
            border: 1px solid rgba(16, 185, 129, 0.25);
            background-color: #ecfdf5;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            color: #166534;
        }

        .admin-sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-radius: 0.75rem;
            padding: 0.6rem 0.75rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: #e5e7eb;
            text-decoration: none;
            transition: all 0.15s ease-out;
        }

        .admin-sidebar-link:hover {
            background-color: rgba(30, 41, 59, 0.9);
            color: #ffffff;
        }

        .admin-sidebar-link.active {
            background-color: rgba(79, 70, 229, 0.2);
            color: #c7d2fe;
            border: 1px solid rgba(79, 70, 229, 0.65);
        }

        .admin-mobile-nav-toggle {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.75rem;
            border: 1px solid rgba(51, 65, 85, 0.9);
            background-color: rgba(15, 23, 42, 0.95);
            padding: 0.5rem 0.75rem;
            color: #e5e7eb;
            transition: all 0.15s ease-out;
        }

        .admin-mobile-nav-toggle:hover {
            border-color: rgba(148, 163, 184, 0.9);
            background-color: rgba(30, 41, 59, 0.95);
            color: #ffffff;
        }
</style>

    @stack('styles')
</head>
<body class="min-h-screen bg-slate-100 text-slate-900">
    <div class="min-h-screen flex bg-slate-100">
        <!-- Sidebar -->
        <aside class="hidden md:flex md:w-64 lg:w-72 flex-col border-r border-slate-800 bg-slate-950">
            <!-- Brand / Profile -->
            <div class="flex items-center justify-between px-5 py-4 border-b border-slate-800">
                <div class="flex items-center gap-3">
                    <div class="flex h-9 w-9 items-center justify-center rounded-2xl bg-indigo-500 shadow-md shadow-indigo-500/40">
                        <span class="text-lg font-semibold text-white">CB</span>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-50">Portfolio Admin</p>
                        <p class="text-xs text-slate-400">
                            {{ auth()->user()->name ?? 'Admin user' }}
                        </p>
                    </div>
                </div>
                <a href="{{ route('home') }}" class="hidden lg:inline-flex items-center gap-1.5 rounded-full border border-slate-700/80 bg-slate-900/80 px-3 py-1 text-xs text-slate-300 hover:text-white hover:border-slate-500 hover:bg-slate-800/90 transition">
                    <i class="fa-solid fa-globe text-[11px]"></i>
                    <span>View site</span>
                </a>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-3 py-4 space-y-5 text-sm overflow-y-auto">
                <!-- Overview -->
                <div>
                    <p class="px-2 text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-400 mb-2">Overview</p>
                    <a href="{{ route('admin.dashboard') }}" class="admin-sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-gauge-high text-xs"></i>
                        <span>Dashboard</span>
                    </a>
                </div>

                <!-- Projects -->
                <div>
                    <p class="px-2 text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-400 mb-2">Projects</p>
                    <a href="{{ route('admin.all-projects') }}" class="admin-sidebar-link {{ request()->routeIs('admin.all-projects') || request()->routeIs('admin.projects.index') ? 'active' : '' }}">
                        <i class="fa-solid fa-briefcase text-xs"></i>
                        <span>All projects</span>
                    </a>
                    <a href="{{ route('admin.projects.create') }}" class="admin-sidebar-link {{ request()->routeIs('admin.projects.create') ? 'active' : '' }}">
                        <i class="fa-solid fa-circle-plus text-xs"></i>
                        <span>New project</span>
                    </a>
                </div>

                <!-- Testimonials -->
                <div>
                    <p class="px-2 text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-400 mb-2">Testimonials</p>
                    <a href="{{ route('admin.all-testimonials') }}" class="admin-sidebar-link {{ request()->routeIs('admin.all-testimonials') || request()->routeIs('admin.testimonials.index') ? 'active' : '' }}">
                        <i class="fa-solid fa-message-lines text-xs"></i>
                        <span>All testimonials</span>
                    </a>
                    <a href="{{ route('admin.testimonials.create') }}" class="admin-sidebar-link {{ request()->routeIs('admin.testimonials.create') ? 'active' : '' }}">
                        <i class="fa-solid fa-square-plus text-xs"></i>
                        <span>New testimonial</span>
                    </a>
                </div>

                <!-- Settings (placeholder for future) -->
                <div>
                    <p class="px-2 text-[11px] font-semibold uppercase tracking-[0.16em] text-slate-400 mb-2">System</p>
                    <a href="#" class="admin-sidebar-link cursor-default opacity-70">
                        <i class="fa-solid fa-gear text-xs"></i>
                        <span>Settings (coming soon)</span>
                    </a>
                </div>
            </nav>

            <!-- Footer / Account -->
            <div class="px-4 py-4 border-t border-slate-800 text-xs text-slate-500 space-y-2">
                <div>
                    <p class="mb-0.5 font-medium text-slate-400">Signed in as</p>
                    <p class="truncate text-slate-300">{{ auth()->user()->email ?? 'admin@example.com' }}</p>
                </div>
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="admin-btn-ghost w-full justify-center text-[11px]">
                            <i class="fa-solid fa-right-from-bracket text-[10px]"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                @endauth
            </div>
        </aside>

        <!-- Main column -->
        <div class="flex-1 flex flex-col">
            <!-- Mobile top bar -->
            <header class="md:hidden sticky top-0 z-20 border-b border-slate-200 bg-white/95 backdrop-blur">
                <div class="flex items-center justify-between px-4 py-3">
                    <div>
                        <p class="text-sm font-semibold text-slate-900">Portfolio Admin</p>
                        <p class="text-[11px] text-slate-500">Manage your content</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('home') }}" class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-slate-50 px-3 py-1.5 text-[11px] text-slate-600 hover:text-slate-900 hover:border-slate-300 hover:bg-white transition">
                            <i class="fa-solid fa-globe text-[10px] mr-1"></i>
                            Site
                        </a>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <main class="flex-1 px-4 py-5 sm:px-6 lg:px-8">
                <div class="mx-auto w-full max-w-5xl space-y-6">
                    <!-- Page heading -->
                    <div class="flex items-center justify-between gap-3">
                        <div>
                            <h1 class="text-lg font-semibold tracking-tight text-slate-900">@yield('title')</h1>
                            <p class="mt-1 text-xs text-slate-500">Admin area • {{ now()->format('M j, Y') }}</p>
                        </div>
                    </div>

                    @yield('content')
                </div>
            </main>

            <footer class="border-t border-slate-800/80 px-4 py-3 text-[11px] text-slate-500 flex items-center justify-between">
                <span>&copy; {{ date('Y') }} Chamikara Bandara</span>
                <span class="hidden sm:inline">Built with Laravel • Admin</span>
            </footer>
        </div>
    </div>

    @stack('scripts')
</body>
</html>