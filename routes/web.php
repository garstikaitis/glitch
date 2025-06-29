<?php

declare(strict_types=1);

use App\Http\Controllers\CurrentSessionController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [CurrentSessionController::class, 'show'])->name('currentSession.show');
Route::post('/current-session', [CurrentSessionController::class, 'store'])->name('currentSession.store');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
