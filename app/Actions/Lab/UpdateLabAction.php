<?php

declare(strict_types=1);

namespace App\Actions\Lab;

use App\Data\Lab\LabData;
use App\Models\Lab;

class UpdateLabAction
{
    public function handle(Lab $lab, LabData $data): Lab
    {
        $lab->update([
            'icon' => $data->icon,
            'box_size' => $data->box_size,
            'title' => $data->title,
            'description' => $data->description,
            'is_active' => $data->is_active,
        ]);

        return $lab;
    }
}
