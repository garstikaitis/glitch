<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\CreateWidgetAction;
use App\Http\Requests\UpsertWidgetRequest;
use App\Models\Organization;
use App\Models\Widget;
use Illuminate\Http\JsonResponse;
use Throwable;

final class WidgetsController extends Controller
{
    public function index(): JsonResponse
    {
        return $this->ok(Widget::all());
    }

    /**
     * @throws Throwable
     */
    public function store(UpsertWidgetRequest $request, Organization $organization, CreateWidgetAction $action): JsonResponse
    {
        return $this->ok(
            $action->handle($request->toDTO(), $organization)
        )->setStatusCode(201);
    }
}
