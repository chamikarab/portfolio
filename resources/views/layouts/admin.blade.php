<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#020617">
    <title>@yield('title') • Admin</title>

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.svg') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Typography & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <!-- Admin-specific styles for Minimalist Futuristic 2026 Look -->
    <style>
        :root {
            --admin-bg: #020617;
            --admin-sidebar: #020617;
            --admin-card: rgba(15, 23, 42, 0.6);
            --admin-border: rgba(255, 255, 255, 0.06);
            --admin-accent: #6366f1;
            --admin-accent-glow: rgba(99, 102, 241, 0.3);
            --admin-text: #f1f5f9;
            --admin-text-muted: #94a3b8;
            --sidebar-width: 260px;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background-color: var(--admin-bg);
            color: var(--admin-text);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* Ambient Background */
        .admin-ambient-bg {
            position: fixed;
            inset: 0;
            z-index: -1;
            background: 
                radial-gradient(circle at 0% 0%, rgba(99, 102, 241, 0.08) 0%, transparent 40%),
                radial-gradient(circle at 100% 100%, rgba(168, 85, 247, 0.05) 0%, transparent 40%);
        }

        /* Sidebar Styles */
        .admin-sidebar {
            width: var(--sidebar-width);
            background-color: var(--admin-sidebar);
            border-right: 1px solid var(--admin-border);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 50;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            margin: 0.25rem 1rem;
            border-radius: 0.75rem;
            color: var(--admin-text-muted);
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .sidebar-link i {
            font-size: 1.1rem;
            width: 1.25rem;
            text-align: center;
            opacity: 0.7;
        }

        .sidebar-link:hover {
            background-color: rgba(255, 255, 255, 0.04);
            color: white;
        }

        .sidebar-link.active {
            background-color: rgba(99, 102, 241, 0.1);
            color: var(--admin-accent);
        }

        .sidebar-link.active i {
            opacity: 1;
        }

        /* Main Content Area */
        .admin-main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            padding: 2.5rem;
        }

        /* Header UI */
        .admin-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2.5rem;
        }

        .admin-page-title {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: -0.025em;
            color: white;
        }

        /* Card System */
        .admin-card {
            background: var(--admin-card);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--admin-border);
            border-radius: 1.25rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .admin-card:hover {
            border-color: rgba(255, 255, 255, 0.12);
            background: rgba(15, 23, 42, 0.7);
        }

        /* Buttons */
        .btn-modern-primary {
            background-color: var(--admin-accent);
            color: white;
            padding: 0.625rem 1.25rem;
            border-radius: 0.75rem;
            font-size: 0.875rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px var(--admin-accent-glow);
        }

        .btn-modern-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 16px var(--admin-accent-glow);
            filter: brightness(1.1);
        }

        .btn-modern-secondary {
            background-color: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--admin-border);
            color: var(--admin-text);
            padding: 0.625rem 1.25rem;
            border-radius: 0.75rem;
            font-size: 0.875rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s ease;
        }

        .btn-modern-secondary:hover {
            background-color: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.2);
        }

        /* Form Inputs */
        .admin-input-modern {
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid var(--admin-border);
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
            color: white;
            font-size: 0.875rem;
            width: 100%;
            transition: all 0.2s ease;
        }

        .admin-input-modern:focus {
            outline: none;
            border-color: var(--admin-accent);
            background: rgba(0, 0, 0, 0.3);
            box-shadow: 0 0 0 4px var(--admin-accent-glow);
        }

        /* Table UI */
        .modern-table {
            width: 100%;
            border-collapse: collapse;
        }

        .modern-table th {
            text-align: left;
            padding: 1rem;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--admin-text-muted);
            border-bottom: 1px solid var(--admin-border);
        }

        .modern-table td {
            padding: 1.25rem 1rem;
            font-size: 0.875rem;
            color: var(--admin-text);
            border-bottom: 1px solid var(--admin-border);
        }

        .modern-table tr:last-child td {
            border-bottom: none;
        }

        .modern-table tr:hover td {
            background-color: rgba(255, 255, 255, 0.01);
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        @media (max-width: 1024px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            .admin-main {
                margin-left: 0;
                padding: 1.5rem;
            }
        }
    </style>




    @stack('styles')
</head>
<body class="min-h-screen">
    <div class="admin-ambient-bg"></div>

    <div class="flex">
        <!-- Minimalist Sidebar -->
        <aside class="admin-sidebar hidden lg:flex">
            <div class="p-8">
                <div class="flex items-center gap-3 mb-10">
                    <div class="w-10 h-10 rounded-xl bg-indigo-600 flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-indigo-600/20">
                        C
                    </div>
                    <span class="font-bold tracking-tight text-white">Admin</span>
                </div>

                <nav class="space-y-1">
                    <p class="px-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-4">Core</p>
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fa-solid fa-house-chimney"></i>
                        <span>Dashboard</span>
                    </a>

                    <p class="px-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-4 mt-8">Management</p>
                    <a href="{{ route('admin.all-projects') }}" class="sidebar-link {{ request()->routeIs('admin.all-projects') || request()->routeIs('admin.projects.index') ? 'active' : '' }}">
                        <i class="fa-solid fa-layer-group"></i>
                        <span>Projects</span>
                    </a>
                    <a href="{{ route('admin.all-testimonials') }}" class="sidebar-link {{ request()->routeIs('admin.all-testimonials') || request()->routeIs('admin.testimonials.index') ? 'active' : '' }}">
                        <i class="fa-solid fa-comment-dots"></i>
                        <span>Testimonials</span>
                    </a>

                    <p class="px-4 text-[10px] font-bold text-gray-500 uppercase tracking-widest mb-4 mt-8">External</p>
                    <a href="{{ route('home') }}" class="sidebar-link" target="_blank">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        <span>View Website</span>
                    </a>
                </nav>
            </div>

            <!-- User Bottom -->
            <div class="mt-auto p-6 border-t border-white/5">
                <div class="flex items-center gap-3 mb-6 px-2">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-500"></div>
                    <div class="min-w-0">
                        <p class="text-sm font-semibold text-white truncate">{{ auth()->user()->name }}</p>
                        <p class="text-[10px] text-gray-500 truncate">Administrator</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="sidebar-link w-full border-none !m-0 hover:text-red-400">
                        <i class="fa-solid fa-power-off"></i>
                        <span>Sign Out</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="admin-main flex-1">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>



    @stack('scripts')
</body>

    @stack('scripts')
</body>
</html>