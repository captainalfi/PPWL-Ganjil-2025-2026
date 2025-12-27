<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (Laravel Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| ROUTES YANG BUTUH LOGIN (SEMUA USER)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // DASHBOARD USER BIASA
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| ROUTES KHUSUS ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {

    // ADMIN DASHBOARD
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // MENU ADMIN
    Route::view('/admin/students', 'admin.students')->name('admin.students');
    Route::view('/admin/courses', 'admin.courses')->name('admin.courses');

    // CATEGORY CRUD
    Route::resource('categories', CategoryController::class);

    // PRODUCT CRUD
    Route::resource('products', ProductController::class);
});