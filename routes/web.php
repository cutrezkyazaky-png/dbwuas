<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\DashboardController;

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