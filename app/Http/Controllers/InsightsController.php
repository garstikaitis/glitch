<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class InsightsController
{
    public function show()
    {
        return Inertia::render('Insights', []);
    }
}
