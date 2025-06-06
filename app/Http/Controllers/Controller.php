<?php

declare(strict_types=1);

namespace App\Http\Controllers;

abstract class Controller
{
    protected function ok(mixed $data, ?string $message = null)
    {
        return response()->json([
            ...$data,
            'success' => true,
            'message' => $message,
        ]);
    }

    protected function oops(string $message)
    {
        return response()->json([
            'success' => false,
            'data' => [],
            'message' => $message,
        ]);
    }
}
