<?php

declare(strict_types=1);

namespace App\DTOs;

use App\Concerns\Arrayable;

final readonly class WidgetDTO
{
    use Arrayable;

    public function __construct(public string $name, public string $domain, public ?string $uuid, public string $type) {}
}
