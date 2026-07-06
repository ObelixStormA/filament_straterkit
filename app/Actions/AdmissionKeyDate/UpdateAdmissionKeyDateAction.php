<?php

declare(strict_types=1);

namespace App\Actions\AdmissionKeyDate;

use App\Data\AdmissionKeyDate\AdmissionKeyDateData;
use App\Models\AdmissionKeyDate;

class UpdateAdmissionKeyDateAction
{
    public function handle(AdmissionKeyDate $admissionKeyDate, AdmissionKeyDateData $data): AdmissionKeyDate
    {
        $admissionKeyDate->update([
            'date_start' => $data->date_start,
            'date_end' => $data->date_end,
            'title' => $data->title,
            'is_active' => $data->is_active,
        ]);

        return $admissionKeyDate;
    }
}
