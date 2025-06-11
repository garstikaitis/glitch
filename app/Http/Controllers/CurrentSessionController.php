<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Concerns\RespondsWithDefaults;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

final class CurrentSessionController
{
    use RespondsWithDefaults;

    public function store(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember' => 'bool',
        ]);

        if (Auth::attempt($credentials, $credentials['remember'] ?? false)) {
            $request->session()->regenerate();

            return $this->ok(Auth::user());
        }

        return $this->oops('Invalid credentials')->setStatusCode(401);
    }

    public function destroy(): JsonResponse
    {
        Auth::logout();

        return $this->ok([]);
    }
}
