<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','Admin Dashboard') — {{ config('app.name') }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100">

    {{-- Topbar --}}
    <header class="bg-white border-b sticky top-0 z-30">
        <div class="mx-auto max-w-7xl px-4 py-3 flex items-center justify-between">

            <div class="flex items-center gap-3">
                <span class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-600 text-white font-bold">
                    A
                </span>
                <h1 class="font-semibold text-slate-800">
                    {{ ucfirst(Auth::user()->role) }}
                </h1>
            </div>

            <nav class="flex items-center gap-4 text-sm">
                <a href="{{ route('dashboard') }}" class="hover:text-indigo-600">Dashboard</a>
                <a href="{{ route('admin.dashboard') }}" class="hover:text-indigo-600">Admin Panel</a>
                <a href="{{ url('/') }}" class="hover:text-indigo-600">Home</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="px-3 py-1.5 rounded-lg bg-slate-900 text-white hover:bg-slate-700">
                        Logout
                    </button>
                </form>
            </nav>

        </div>
    </header>

    <div class="mx-auto max-w-7xl px-4 py-6 grid grid-cols-12 gap-6">

        {{-- Sidebar (ADMIN ONLY) --}}
        <aside class="col-span-12 lg:col-span-3">
            <div class="bg-white rounded-xl shadow p-4 space-y-2 text-sm">

                <div class="font-semibold text-slate-700 mb-2">Navigation</div>

                <a href="{{ route('admin.dashboard') }}"
                   class="block px-3 py-2 rounded hover:bg-slate-100 {{ request()->routeIs('admin.dashboard') ? 'bg-slate-100 font-medium' : '' }}">
                    📊 Overview
                </a>

                <a href="{{ route('admin.students') }}"
                   class="block px-3 py-2 rounded hover:bg-slate-100 {{ request()->routeIs('admin.students') ? 'bg-slate-100 font-medium' : '' }}">
                    👤 Students
                </a>

                <a href="{{ route('admin.courses') }}"
                   class="block px-3 py-2 rounded hover:bg-slate-100 {{ request()->routeIs('admin.courses') ? 'bg-slate-100 font-medium' : '' }}">
                    📚 Courses
                </a>

                <a href="{{ route('categories.index') }}"
                   class="block px-3 py-2 rounded hover:bg-slate-100 {{ request()->routeIs('categories.*') ? 'bg-slate-100 font-medium text-indigo-600' : '' }}">
                    🏷️ Categories
                </a>

                <a href="{{ route('products.index') }}"
                   class="block px-3 py-2 rounded hover:bg-slate-100 {{ request()->routeIs('products.*') ? 'bg-slate-100 font-medium text-indigo-600' : '' }}">
                    🛒 Products
                </a>

            </div>
        </aside>

        {{-- Main Content --}}
        <main class="col-span-12 lg:col-span-9">
            @yield('content')
        </main>

    </div>

    <footer class="text-center text-xs text-slate-500 py-6">
        © {{ date('Y') }} {{ config('app.name') }} — Admin Panel
    </footer>

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Global delete confirmation --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.js-delete-confirm').forEach(form => {
                form.addEventListener('submit', e => {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Delete this data?',
                        text: 'This action cannot be undone.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6b7280',
                        confirmButtonText: 'Yes, delete it',
                        cancelButtonText: 'Cancel',
                        reverseButtons: true,
                    }).then(result => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

</body>
</html>
