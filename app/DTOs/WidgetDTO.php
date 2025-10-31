<?php

declare(strict_types=1);

namespace App\DTOs;

use App\Concerns\Arrayable;

final readonly class WidgetDTO
{
    use Arrayable;

    public function __construct(private string $name, private string $domain, private ?string $uuid, private string $type) {}
}
