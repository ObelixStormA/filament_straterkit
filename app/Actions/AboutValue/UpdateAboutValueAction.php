<?php

declare(strict_types=1);

namespace App\Actions\AboutValue;

use App\Data\AboutValue\AboutValueData;
use App\Models\AboutValue;

class UpdateAboutValueAction
{
    public function handle(AboutValue $aboutValue, AboutValueData $data): AboutValue
    {
        $aboutValue->update([
            'icon' => $data->icon,
            'title' => $data->title,
            'is_active' => $data->is_active,
        ]);

        return $aboutValue;
    }
}
