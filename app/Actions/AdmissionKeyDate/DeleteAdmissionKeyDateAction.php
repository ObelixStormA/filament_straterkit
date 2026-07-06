<?php

declare(strict_types=1);

namespace App\Actions\AdmissionKeyDate;

use App\Models\AdmissionKeyDate;

class DeleteAdmissionKeyDateAction
{
    public function handle(AdmissionKeyDate $admissionKeyDate): void
    {
        $admissionKeyDate->delete();
    }
}
