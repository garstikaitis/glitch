<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\CreateOrganizationAction;
use App\Http\Requests\UpsertOrganizationRequest;
use App\Models\Organization;
use Illuminate\Http\JsonResponse;
use Throwable;

final class OrganizationsController extends Controller
{
    /**
     * @throws Throwable
     */
    public function store(UpsertOrganizationRequest $request, CreateOrganizationAction $action): JsonResponse
    {
        return $this->ok(
            $action->handle($request->toDTO())
        )->setStatusCode(201);
    }

    public function index(): JsonResponse
    {
        return $this->ok(Organization::all());
    }
}
