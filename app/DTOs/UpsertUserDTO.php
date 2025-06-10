<?php

declare(strict_types=1);

namespace App\DTOs;

use App\Traits\Arrayable;

final readonly class UpsertUserDTO
{
    use Arrayable;

    public function __construct(public int $organizationId, public string $name, public string $email, public string $emailVerifiedAt, public string $password, public string $rememberToken) {}
}
