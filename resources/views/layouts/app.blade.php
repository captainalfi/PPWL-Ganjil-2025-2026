<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', config('app.name'))</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-slate-100">

    {{-- Top Navigation --}}
    <header class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <a href="{{ url('/') }}" class="flex items-center gap-2">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-600 text-white font-bold">
                        A
                    </span>
                    <span class="font-semibold text-slate-800 text-sm sm:text-base">
                        {{ config('app.name', 'Laravel') }}
                    </span>
                </a>
            </div>

            <nav class="flex items-center gap-4 text-sm">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-indigo-600">
                        Dashboard
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button
                            type="submit"
                            class="px-3 py-1.5 rounded-lg bg-slate-900 text-white hover:bg-slate-700 text-xs sm:text-sm">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:text-indigo-600">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                       class="px-3 py-1.5 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 text-xs sm:text-sm">
                        Register
                    </a>
                @endauth
            </nav>
        </div>
    </header>

    {{-- Page Content --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    <footer class="text-center text-xs text-slate-500 py-6">
        © {{ date('Y') }} {{ config('app.name') }} — Admin Panel
    </footer>
</body>
</html>
