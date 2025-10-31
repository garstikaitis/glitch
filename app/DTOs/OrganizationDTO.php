<?php

declare(strict_types=1);

namespace App\DTOs;

use App\Concerns\Arrayable;

final readonly class OrganizationDTO
{
    use Arrayable;

    public function __construct(private string $name, private string $slug, private string $subscriptionType) {}
}
