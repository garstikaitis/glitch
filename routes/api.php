<?php

use App\Http\Controllers\WidgetSubmitsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/widgets/{widget:uuid}/submits', [WidgetSubmitsController::class, 'store'])->name('widget_submits.store');
