<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\UpsertUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

final class UsersController
{
    public function store(UpsertUserRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['name'] = fake()->name;
        $user = User::create($data);
        Auth::login($user);
        return redirect()->route('dashboard.index');
    }
    public function show(): \Inertia\Response
    {
        return Inertia::render('Register');
    }
}
