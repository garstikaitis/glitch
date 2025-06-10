<?php

declare(strict_types=1);

arch()
    ->expect('App')
    ->toUseStrictTypes()
    ->not->toUse(['die', 'dd', 'dump']);

arch()
    ->expect('App\Models')
    ->toBeClasses()
    ->toExtend('Illuminate\Database\Eloquent\Model');

arch()
    ->expect('App\Http')
    ->toOnlyBeUsedIn('App\Http');

arch()
    ->expect('App\Concerns')
    ->toBeTraits();

arch()->preset()->php();
arch()->preset()->strict();
arch()->preset()->laravel();
arch()->preset()->security();
