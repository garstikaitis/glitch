<?php

declare(strict_types=1);

namespace App\DTOs;

use App\Concerns\Arrayable;

final readonly class UserDTO
{
    use Arrayable;

    public function __construct(private ?int $organizationId, private string $name, private string $email, private ?string $emailVerifiedAt, private ?string $password, private ?string $rememberToken) {}
}
