<?php

declare(strict_types=1);

namespace App\Actions\StatNumber;

use App\Data\StatNumber\StatNumberData;
use App\Models\StatNumber;

class UpdateStatNumberAction
{
    public function handle(StatNumber $statNumber, StatNumberData $data): StatNumber
    {
        $statNumber->update([
            'icon' => $data->icon,
            'number_value' => $data->number_value,
            'suffix' => $data->suffix,
            'label' => $data->label,
            'is_active' => $data->is_active,
        ]);

        return $statNumber;
    }
}
