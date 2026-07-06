<?php

declare(strict_types=1);

namespace App\Actions\AdmissionApplication;

use App\Data\AdmissionApplication\AdmissionApplicationData;
use App\Models\AdmissionApplication;

class StoreAdmissionApplicationAction
{
    public function handle(AdmissionApplicationData $data): AdmissionApplication
    {
        return AdmissionApplication::query()->create([
            'first_name' => $data->first_name,
            'last_name' => $data->last_name,
            'birth_year' => $data->birth_year,
            'phone' => $data->phone,
            'email' => $data->email,
            'program_id' => $data->program_id,
            'message' => $data->message,
            'status' => 'new',
        ]);
    }
}
