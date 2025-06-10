<?php

declare(strict_types=1);

namespace App\Actions;

use App\DTOs\UpsertUserDTO;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Throwable;

final readonly class CreateUserAction
{
    /**
     * Execute the action.
     *
     * @throws Throwable
     */
    public function handle(UpsertUserDTO $data): User
    {
        return DB::transaction(function () use ($data): User {
            $user = User::create($data->toArray());
            Organization::find($data->organizationId)
                ->users()
                ->save($user);

            return $user;
        });
    }
}
