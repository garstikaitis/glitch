<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\CreateWidgetAction;
use App\Http\Requests\UpsertWidgetRequest;
use App\Models\Organization;
use App\Models\Widget;
use Throwable;

final class WidgetsController extends Controller
{
    public function index()
    {
        return $this->ok(Widget::all());
    }

    /**
     * @throws Throwable
     */
    public function store(UpsertWidgetRequest $request, Organization $organization, CreateWidgetAction $action)
    {
        return $this->ok(
            $action->handle($request->validated(), $organization)
        )->setStatusCode(201);
    }
}
