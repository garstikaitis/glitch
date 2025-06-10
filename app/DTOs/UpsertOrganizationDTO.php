<?php

declare(strict_types=1);

namespace App\DTOs;

use App\Traits\Arrayable;

final readonly class UpsertOrganizationDTO
{
    use Arrayable;

    public function __construct(public string $name, public string $slug, public string $subscriptionType) {}
}
