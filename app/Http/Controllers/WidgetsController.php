<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\CreateWidgetAction;
use App\Concerns\RespondsWithDefaults;
use App\Http\Requests\UpsertWidgetRequest;
use App\Http\Resources\WidgetResource;
use App\Models\Organization;
use App\Models\Widget;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Throwable;

final class WidgetsController
{
    use RespondsWithDefaults;

    public function index(): Response
    {
        return Inertia::render('Widgets', ['widgets' => WidgetResource::collection(Widget::all())]);
    }

    public function create(): Response
    {
        return Inertia::render('CreateWidget');
    }

    /**
     * @throws Throwable
     */
    public function store(UpsertWidgetRequest $request, Organization $organization, CreateWidgetAction $action): RedirectResponse
    {
        $action->handle($request->toDTO(), $organization);

        return to_route('widgets.index');
    }

    public function showTestWidget()
    {
        return view('test-widget');
    }
}
