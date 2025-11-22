@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-xl shadow max-w-md text-center">

        <h2 class="text-2xl font-bold text-green-600 mb-2">
            ✅ Registrasi Berhasil
        </h2>

        <p class="text-gray-600 mb-6">
            Akun kamu berhasil dibuat. Silakan login untuk masuk ke Dashboard.
        </p>

        <a href="{{ route('login') }}"
           class="inline-block px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
            Kembali ke Login
        </a>
    </div>
</div>
@endsection
