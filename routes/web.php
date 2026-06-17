<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController; 

// Route untuk menampilkan halaman login
Route::get('/login', function () {
    return view('login'); 
})->name('login');

// Route untuk MENAMPILKAN halaman login (Sudah ada di kodemu)
Route::get('/login', function () {
    return view('login'); 
})->name('login');

// Route baru untuk MEMPROSES verifikasi akun login (POST)
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

Route::redirect('/', '/dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::resource('targets', TargetController::class);

Route::get('/my-targets', [TargetController::class, 'myTargets'])
    ->name('targets.my');

Route::get('/inspiration', function () {
    return view('inspiration');
})->name('inspiration');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Route menampilkan halaman register (GET)
Route::get('/register', function () {
    return view('register');
})->name('register');

// Route memproses pendaftaran akun ke database (POST)
Route::post('/register', [AuthController::class, 'register'])
    ->name('register.store');

// =========================================================================
// ROUTE KHUSUS DASHBOARD ADMIN (MANAJEMEN PENGGUNA)
// =========================================================================
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::patch('/admin/users/{id}/toggle-role', [AdminController::class, 'toggleRole'])->name('admin.users.toggleRole');
Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy');