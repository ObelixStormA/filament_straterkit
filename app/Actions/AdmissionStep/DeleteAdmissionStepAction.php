<?php

declare(strict_types=1);

namespace App\Actions\AdmissionStep;

use App\Models\AdmissionStep;

class DeleteAdmissionStepAction
{
    public function handle(AdmissionStep $admissionStep): void
    {
        $admissionStep->delete();
    }
}
