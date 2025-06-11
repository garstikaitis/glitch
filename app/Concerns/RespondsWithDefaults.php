<?php

declare(strict_types=1);

namespace App\Concerns;

use Illuminate\Http\JsonResponse;

trait RespondsWithDefaults
{
    protected function ok(mixed $data, ?string $message = null): JsonResponse
    {
        return response()->json([
            ...$data,
            'success' => true,
            'message' => $message,
        ]);
    }

    protected function oops(string $message): JsonResponse
    {
        return response()->json([
            'success' => false,
            'data' => [],
            'message' => $message,
        ]);
    }
}
