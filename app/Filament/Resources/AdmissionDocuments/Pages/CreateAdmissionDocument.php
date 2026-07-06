<?php

declare(strict_types=1);

namespace App\Filament\Resources\AdmissionDocuments\Pages;

use App\Actions\AdmissionDocument\CreateAdmissionDocumentAction;
use App\Data\AdmissionDocument\AdmissionDocumentData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\AdmissionDocuments\AdmissionDocumentResource;
use App\Models\AdmissionDocument;
use Filament\Resources\Pages\CreateRecord;

class CreateAdmissionDocument extends CreateRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = AdmissionDocumentResource::class;

    protected function handleRecordCreation(array $data): AdmissionDocument
    {
        $data = $this->packTranslatable($data, ['name']);

        return app(CreateAdmissionDocumentAction::class)->handle(AdmissionDocumentData::from($data));
    }
}
