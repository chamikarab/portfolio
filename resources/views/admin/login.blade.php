<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#020617">
    <title>Admin Login • Portfolio</title>

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.svg') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Typography & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            min-height: 100vh;
            background: linear-gradient(to bottom right, #f1f5f9, #e2e8f0);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .login-card {
            position: relative;
            width: 100%;
            max-width: 420px;
            border-radius: 1.5rem;
            border: 1px solid rgba(148, 163, 184, 0.35);
            background:
                radial-gradient(circle at top left, rgba(59, 130, 246, 0.14), transparent 55%),
                radial-gradient(circle at bottom right, rgba(45, 212, 191, 0.12), transparent 55%),
                linear-gradient(to bottom right, #f9fafb, #e5e7eb);
            box-shadow:
                0 20px 50px rgba(15, 23, 42, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.6) inset;
            backdrop-filter: blur(14px);
            padding: 2rem;
        }

        @media (min-width: 640px) {
            .login-card {
                padding: 2.5rem;
            }
        }

        .login-form-control {
            margin-top: 0.5rem;
            display: block;
            width: 100%;
            border-radius: 0.75rem;
            border: 1px solid #d1d5db;
            background-color: #ffffff;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            color: #111827;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.1);
            outline: none;
            transition: all 0.15s ease-out;
        }

        .login-form-control::placeholder {
            color: #9ca3af;
        }

        .login-form-control:focus {
            border-color: #818cf8;
            box-shadow: 0 0 0 3px rgba(129, 140, 248, 0.2);
        }

        .login-btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            border-radius: 9999px;
            background-color: #4f46e5;
            color: #ffffff;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.35);
            border: none;
            cursor: pointer;
            transition: all 0.15s ease-out;
            width: 100%;
        }

        .login-btn-primary:hover {
            background-color: #6366f1;
            transform: translateY(-1px);
            box-shadow: 0 14px 35px rgba(79, 70, 229, 0.5);
        }

        .login-btn-primary:active {
            transform: translateY(0);
        }

        .login-alert-error {
            margin-bottom: 1rem;
            border-radius: 0.75rem;
            border: 1px solid rgba(239, 68, 68, 0.3);
            background-color: #fef2f2;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            color: #991b1b;
        }

        .login-alert-success {
            margin-bottom: 1rem;
            border-radius: 0.75rem;
            border: 1px solid rgba(16, 185, 129, 0.25);
            background-color: #ecfdf5;
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            color: #166534;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <!-- Logo/Brand -->
        <div class="text-center mb-6">
            <div class="inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-indigo-500 shadow-lg shadow-indigo-500/40 mb-4">
                <span class="text-2xl font-semibold text-white">CB</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-semibold tracking-tight text-slate-900 mb-2">
                Admin Login
            </h1>
            <p class="text-sm text-slate-600">
                Sign in to access your portfolio dashboard
            </p>
        </div>

        <!-- Error Messages -->
        @if($errors->any())
            <div class="login-alert-error">
                <p class="font-medium mb-1">Login failed</p>
                <ul class="list-disc list-inside space-y-0.5 text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('status'))
            <div class="login-alert-success">
                {{ session('status') }}
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('admin.login') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-xs font-semibold tracking-[0.16em] uppercase text-slate-600 mb-1">
                    Email Address
                </label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    placeholder="admin@example.com"
                    required
                    autofocus
                    class="login-form-control"
                >
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold tracking-[0.16em] uppercase text-slate-600 mb-1">
                    Password
                </label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Enter your password"
                    required
                    class="login-form-control"
                >
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2 text-slate-600">
                    <input
                        type="checkbox"
                        name="remember"
                        class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500"
                    >
                    <span>Remember me</span>
                </label>
            </div>

            <button type="submit" class="login-btn-primary">
                <i class="fa-solid fa-right-to-bracket text-sm"></i>
                <span>Sign In</span>
            </button>
        </form>

        <!-- Footer -->
        <div class="mt-6 pt-6 border-t border-slate-200 text-center">
            <p class="text-xs text-slate-500">
                &copy; {{ date('Y') }} Chamikara Bandara • Portfolio Admin
            </p>
        </div>
    </div>
</body>
</html>
