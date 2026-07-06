<?php

declare(strict_types=1);

namespace App\Actions\Lab;

use App\Data\Lab\LabData;
use App\Models\Lab;

class CreateLabAction
{
    public function handle(LabData $data): Lab
    {
        $order = Lab::query()->max('order');

        return Lab::query()->create([
            'icon' => $data->icon,
            'box_size' => $data->box_size,
            'title' => $data->title,
            'description' => $data->description,
            'is_active' => $data->is_active,
            'order' => $order === null ? 0 : $order + 1,
        ]);
    }
}
