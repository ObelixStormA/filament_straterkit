<?php

declare(strict_types=1);

namespace App\Actions\AdmissionDocument;

use App\Data\AdmissionDocument\AdmissionDocumentData;
use App\Models\AdmissionDocument;

class CreateAdmissionDocumentAction
{
    public function handle(AdmissionDocumentData $data): AdmissionDocument
    {
        $order = AdmissionDocument::query()->max('order');

        return AdmissionDocument::query()->create([
            'file_template_url' => $data->file_template_url,
            'name' => $data->name,
            'is_active' => $data->is_active,
            'order' => $order === null ? 0 : $order + 1,
        ]);
    }
}
