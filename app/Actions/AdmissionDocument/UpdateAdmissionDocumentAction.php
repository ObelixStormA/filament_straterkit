<?php

declare(strict_types=1);

namespace App\Actions\AdmissionDocument;

use App\Data\AdmissionDocument\AdmissionDocumentData;
use App\Models\AdmissionDocument;

class UpdateAdmissionDocumentAction
{
    public function handle(AdmissionDocument $admissionDocument, AdmissionDocumentData $data): AdmissionDocument
    {
        $admissionDocument->update([
            'file_template_url' => $data->file_template_url,
            'name' => $data->name,
            'is_active' => $data->is_active,
        ]);

        return $admissionDocument;
    }
}
