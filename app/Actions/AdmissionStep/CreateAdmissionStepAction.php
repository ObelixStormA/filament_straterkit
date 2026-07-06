<?php

declare(strict_types=1);

namespace App\Actions\AdmissionStep;

use App\Data\AdmissionStep\AdmissionStepData;
use App\Models\AdmissionStep;

class CreateAdmissionStepAction
{
    public function handle(AdmissionStepData $data): AdmissionStep
    {
        $order = AdmissionStep::query()->max('order');

        return AdmissionStep::query()->create([
            'step_number' => $data->step_number,
            'icon' => $data->icon,
            'title' => $data->title,
            'description' => $data->description,
            'is_active' => $data->is_active,
            'order' => $order === null ? 0 : $order + 1,
        ]);
    }
}
