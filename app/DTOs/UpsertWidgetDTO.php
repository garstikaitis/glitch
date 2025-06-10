<?php

declare(strict_types=1);

namespace App\DTOs;

use App\Concerns\Arrayable;

final readonly class UpsertWidgetDTO
{
    use Arrayable;

    public function __construct(public string $name, public string $domain, public string $type) {}
}
