<?php

declare(strict_types=1);

namespace App\Actions\AboutValue;

use App\Data\AboutValue\AboutValueData;
use App\Models\AboutValue;

class CreateAboutValueAction
{
    public function handle(AboutValueData $data): AboutValue
    {
        $order = AboutValue::query()->max('order');

        return AboutValue::query()->create([
            'icon' => $data->icon,
            'title' => $data->title,
            'is_active' => $data->is_active,
            'order' => $order === null ? 0 : $order + 1,
        ]);
    }
}
