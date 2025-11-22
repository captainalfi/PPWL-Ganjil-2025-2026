<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }} — Auth</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 antialiased">

    {{-- Sneat-style Auth Layout --}}
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="max-w-5xl w-full grid md:grid-cols-2 gap-0 bg-white rounded-2xl shadow-xl overflow-hidden">

            {{-- Left panel (brand / ilustrasi) --}}
            <div class="hidden md:flex flex-col justify-between bg-indigo-600 text-white p-8">
                <div>
                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-white/10 border border-white/30 text-lg font-bold">
                        UTS
                    </span>
                    <h2 class="mt-6 text-2xl font-semibold">
                        PPWL — Sneat Template
                    </h2>
                    <p class="mt-2 text-sm text-indigo-100">
                        Sistem sederhana untuk UTS PPWL dengan autentikasi Laravel Breeze.
                    </p>
                </div>

                <p class="text-xs text-indigo-100">
                    © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                </p>
            </div>

            {{-- Right panel (form auth) --}}
            <div class="p-8 md:p-10 flex flex-col justify-center">
                {{ $slot }}
            </div>
        </div>
    </div>

</body>
</html>
