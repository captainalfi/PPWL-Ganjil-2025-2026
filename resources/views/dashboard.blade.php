@extends('layouts.user')

@section('title', 'Dashboard UTS PPWL')

@section('content')
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-2xl font-semibold text-slate-800 mb-3">
            Selamat datang di halaman Dashboard UTS PPWL.
        </h1>
        <p class="text-slate-600 text-sm">
            Halaman ini dibuat khusus untuk memenuhi ketentuan UTS:
            route <code>/dashboard</code> hanya bisa diakses oleh user yang sudah login,
            dan menampilkan pesan sambutan sesuai instruksi soal.
        </p>
    </div>
@endsection
