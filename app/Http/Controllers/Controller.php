<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

final abstract class Controller
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
