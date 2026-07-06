<?php

declare(strict_types=1);

namespace App\Actions\AdmissionStep;

use App\Data\AdmissionStep\AdmissionStepData;
use App\Models\AdmissionStep;

class UpdateAdmissionStepAction
{
    public function handle(AdmissionStep $admissionStep, AdmissionStepData $data): AdmissionStep
    {
        $admissionStep->update([
            'step_number' => $data->step_number,
            'icon' => $data->icon,
            'title' => $data->title,
            'description' => $data->description,
            'is_active' => $data->is_active,
        ]);

        return $admissionStep;
    }
}
