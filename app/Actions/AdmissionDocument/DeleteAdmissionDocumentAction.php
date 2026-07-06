<?php

declare(strict_types=1);

namespace App\Actions\AdmissionDocument;

use App\Models\AdmissionDocument;

class DeleteAdmissionDocumentAction
{
    public function handle(AdmissionDocument $admissionDocument): void
    {
        $admissionDocument->delete();
    }
}
