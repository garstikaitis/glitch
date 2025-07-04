<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Inertia\Inertia;

final class HomeController
{
    public function index()
    {
        return Inertia::render('Test', []);
    }
}
