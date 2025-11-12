<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Widget extends Model
{
    protected $guarded = [];

    public function submits(): HasMany
    {
        return $this->hasMany(WidgetSubmit::class);
    }
}
