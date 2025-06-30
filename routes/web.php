<?php

declare(strict_types=1);

use App\Http\Controllers\CurrentSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [CurrentSessionController::class, 'show'])->name('currentSession.show');
Route::post('/current-session', [CurrentSessionController::class, 'store'])->name('currentSession.store');
Route::post('/users', [UsersController::class, 'store'])->name('users.store');
Route::get('/register', [UsersController::class, 'show'])->name('users.show');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
