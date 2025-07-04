<?php

declare(strict_types=1);

use App\Http\Controllers\CurrentSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InsightsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WidgetsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [CurrentSessionController::class, 'show'])->name('login');
    Route::post('/current-session', [CurrentSessionController::class, 'store'])->name('currentSession.store');
    Route::delete('/current-session', [CurrentSessionController::class, 'destroy'])->name('currentSession.destroy');
    Route::post('/users', [UsersController::class, 'store'])->name('users.store');
    Route::get('/register', [UsersController::class, 'show'])->name('users.show');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/widgets', [WidgetsController::class, 'index'])->name('widgets.index');
    Route::get('/widgets/create', [WidgetsController::class, 'create'])->name('widgets.create');
    Route::post('/{organization}/widgets', [WidgetsController::class, 'store'])->name('widgets.store');
    Route::get('/insights', [InsightsController::class, 'show'])->name('insights.show');
});
