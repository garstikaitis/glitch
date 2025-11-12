<?php

declare(strict_types=1);

use App\Http\Controllers\CurrentSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InsightsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WidgetsController;
use App\Http\Controllers\WidgetSubmitsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/widgets/{widget:uuid}/embed', [WidgetsController::class, 'embed'])->name('widgets.embed');
Route::get('/test-widget', [WidgetsController::class, 'showTestWidget'])->name('widgets.show-test-widget');
Route::get('/build/assets/{path}', function ($path) {
    $file = public_path("build/assets/{$path}");

    if (!file_exists($file)) {
        abort(404);
    }

    $mimeType = match(pathinfo($path, PATHINFO_EXTENSION)) {
        'js' => 'application/javascript',
        'css' => 'text/css',
        default => 'application/octet-stream'
    };

    return response(file_get_contents($file))
        ->header('Content-Type', $mimeType)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Cache-Control', 'public, max-age=31536000');
})->where('path', '.*');
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
