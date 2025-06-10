<?php

declare(strict_types=1);

namespace App\Actions;

use App\DTOs\UpsertOrganizationDTO;
use App\Models\Organization;
use Illuminate\Support\Facades\DB;
use Throwable;

final readonly class CreateOrganizationAction
{
    /**
     * Execute the action.
     *
     *
     * @throws Throwable
     */
    public function handle(UpsertOrganizationDTO $data): Organization
    {
        return DB::transaction(fn (): Organization => Organization::create($data->toArray()));
    }
}
