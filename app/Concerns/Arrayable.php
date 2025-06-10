<?php

declare(strict_types=1);

namespace App\Concerns;

use Illuminate\Support\Str;

trait Arrayable
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $result = [];
        foreach (get_object_vars($this) as $key => $value) {
            $result[Str::snake($key)] = $value;
        }

        return $result;
    }
}
