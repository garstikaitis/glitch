<?php

declare(strict_types=1);

namespace App\Actions;

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
    public function handle(array $data, Organization $organization): Widget
    {
        return DB::transaction(fn (): Widget => $organization->widgets()->create($data));
    }
}
