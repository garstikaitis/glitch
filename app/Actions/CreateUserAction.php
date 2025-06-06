<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Throwable;

final readonly class CreateUserAction
{
    public function __construct(private array $data) {}

    /**
     * Execute the action.
     *
     * @throws Throwable
     */
    public function handle(): User
    {
        return DB::transaction(function (): User {
            $user = User::create($this->data);
            Organization::find($this->data['organization_id'])
                ->users()
                ->save($user);

            return $user;
        });
    }
}
