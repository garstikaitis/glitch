<?php

namespace App\Actions;

use App\Models\Widget;
use App\Models\WidgetSubmit;
use Illuminate\Support\Facades\DB;

class CreateWidgetSubmit
{
    public function handle(array $data, Widget $widget): WidgetSubmit {

        return DB::transaction(function () use ($data, $widget) {
            $data['organization_id'] = $widget->organization_id;
            return $widget->submits()->create($data);
        });
    }
}
