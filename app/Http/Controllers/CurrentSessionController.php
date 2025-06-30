<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Concerns\RespondsWithDefaults;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

final class CurrentSessionController
{
    use RespondsWithDefaults;

    public function show()
    {
        return Inertia::render('Login');
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember' => 'bool',
        ]);
        if (Auth::attempt($credentials, $credentials['remember'] ?? false)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.index');
        }
        throw ValidationException::withMessages([
            'email' => 'These credentials do not match our records.',
        ])->errorBag('serverErrors');
    }

    public function destroy(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('currentSession.show');
    }
}
