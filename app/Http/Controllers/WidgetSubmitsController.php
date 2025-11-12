<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\CreateWidgetSubmit;
use App\Concerns\RespondsWithDefaults;
use App\Http\Requests\CreateWidgetSubmitRequest;
use App\Models\Widget;
use Illuminate\Http\JsonResponse;

final class WidgetSubmitsController
{
    use RespondsWithDefaults;

    /**
     * @return JsonResponse
     */
    public function store(CreateWidgetSubmitRequest $request, CreateWidgetSubmit $action, Widget $widget)
    {
        return response()->json([
            'data' => $action->handle($request->validated(), $widget),
            'success' => true,
            'message' => 'Submitted successfully.',
        ]);
    }
}
