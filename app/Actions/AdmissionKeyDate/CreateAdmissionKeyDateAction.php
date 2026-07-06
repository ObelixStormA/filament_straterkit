<?php

declare(strict_types=1);

namespace App\Actions\AdmissionKeyDate;

use App\Data\AdmissionKeyDate\AdmissionKeyDateData;
use App\Models\AdmissionKeyDate;

class CreateAdmissionKeyDateAction
{
    public function handle(AdmissionKeyDateData $data): AdmissionKeyDate
    {
        $order = AdmissionKeyDate::query()->max('order');

        return AdmissionKeyDate::query()->create([
            'date_start' => $data->date_start,
            'date_end' => $data->date_end,
            'title' => $data->title,
            'is_active' => $data->is_active,
            'order' => $order === null ? 0 : $order + 1,
        ]);
    }
}
