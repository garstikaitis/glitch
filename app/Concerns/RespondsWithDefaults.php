<?php

declare(strict_types=1);

namespace App\Concerns;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

trait RespondsWithDefaults
{
    protected function ok(mixed $data, ?string $message = null): RedirectResponse
    {
        return response()->json([
            ...$data,
            'success' => true,
            'message' => $message,
        ]);
    }

    protected function oops(string $message): RedirectResponse
    {
        return redirect()->back()->withErrors($message);
    }
}
