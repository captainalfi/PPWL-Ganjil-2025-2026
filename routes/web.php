<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

// -------------------------------
// PUBLIC ROUTES
// -------------------------------
Route::get('/', function () {
    return view('welcome');
});

// Dashboard utama (setelah login) diarahkan ke admin dashboard
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// -------------------------------
// ROUTES YANG BUTUH LOGIN
// -------------------------------
Route::middleware('auth')->group(function () {

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ADMIN DASHBOARD + MENU SAMPING
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/dashboard', function () {
    return view('dashboard'); // <-- ke resources/views/dashboard.blade.php
})->middleware(['auth', 'verified'])->name('dashboard');

    Route::view('/admin/students', 'admin.students')->name('admin.students');
    Route::view('/admin/courses', 'admin.courses')->name('admin.courses');

    // CATEGORY CRUD
    Route::resource('categories', CategoryController::class);

    // PRODUCT CRUD
    Route::resource('products', ProductController::class);
});

require __DIR__.'/auth.php';
