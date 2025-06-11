<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\CreateUserAction;
use App\Concerns\RespondsWithDefaults;
use App\Http\Requests\UpsertUserRequest;
use App\Models\Organization;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;
use Throwable;

final class OrganizationUsersController
{
    use RespondsWithDefaults;

    public function index(Request $request, Organization $organization): JsonResponse
    {
        return $this->ok($organization->users);
    }

    /**
     * @throws Throwable
     */
    public function store(UpsertUserRequest $request, Organization $organization, CreateUserAction $action): JsonResponse
    {
        return $this->ok(
            $action->handle($request->toDTO())
        )->setStatusCode(201);
    }
}
