<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\CreateOrganizationAction;
use App\Http\Requests\UpsertOrganizationRequest;
use App\Models\Organization;
use Throwable;

final class OrganizationsController extends Controller
{
    /**
     * @throws Throwable
     */
    public function store(UpsertOrganizationRequest $request, CreateOrganizationAction $action)
    {
        return $this->ok(
            $action->handle($request->validated())
        )->setStatusCode(201);
    }

    public function index()
    {
        return $this->ok(Organization::all());
    }
}
