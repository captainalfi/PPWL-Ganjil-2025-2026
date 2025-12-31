<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

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
require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| USER ROUTES (SEMUA USER LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // USER DASHBOARD
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |----------------------------------------------------------------------
    | ORDER & CHECKOUT (USER)
    |----------------------------------------------------------------------
    */
    Route::post('/checkout/{product}', [OrderController::class, 'store'])
        ->name('checkout');

    Route::get('/orders', [OrderController::class, 'index'])
        ->name('orders.index');
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (KHUSUS ADMIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::view('/students', 'admin.students')->name('students');
        Route::view('/courses', 'admin.courses')->name('courses');

        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
    });
