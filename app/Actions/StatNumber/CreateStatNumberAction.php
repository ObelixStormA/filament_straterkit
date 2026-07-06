<?php

declare(strict_types=1);

namespace App\Actions\StatNumber;

use App\Data\StatNumber\StatNumberData;
use App\Models\StatNumber;

class CreateStatNumberAction
{
    public function handle(StatNumberData $data): StatNumber
    {
        $order = StatNumber::query()->max('order');

        return StatNumber::query()->create([
            'icon' => $data->icon,
            'number_value' => $data->number_value,
            'suffix' => $data->suffix,
            'label' => $data->label,
            'is_active' => $data->is_active,
            'order' => $order === null ? 0 : $order + 1,
        ]);
    }
}
