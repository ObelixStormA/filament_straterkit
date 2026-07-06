<?php

declare(strict_types=1);

namespace App\Actions\AdmissionApplication;

use App\Models\AdmissionApplication;
use App\Models\User;

class UpdateAdmissionApplicationStatusAction
{
    public function handle(AdmissionApplication $admissionApplication, string $status, User $reviewer): AdmissionApplication
    {
        $admissionApplication->update([
            'status' => $status,
            'reviewed_by' => $reviewer->id,
            'reviewed_at' => now(),
        ]);

        return $admissionApplication;
    }
}
