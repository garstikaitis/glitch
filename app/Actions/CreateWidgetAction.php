<?php

declare(strict_types=1);

namespace App\Actions;

use App\DTOs\WidgetDTO;
use App\Models\Organization;
use App\Models\Widget;
use Illuminate\Support\Facades\DB;
use Throwable;

final readonly class CreateWidgetAction
{
    /**
     * Execute the action.
     *
     * @throws Throwable
     * @throws Throwable
     */
    public function handle(WidgetDTO $data, Organization $organization): Widget
    {
        return DB::transaction(function () use ($organization, $data): Widget {
            /** @var Widget $widget */
            $widget = $organization->widgets()->create($data->toArray());

            return $widget;
        });
    }
}
