<?php

declare(strict_types=1);

namespace App\Filament\Resources\AdmissionDocuments\Pages;

use App\Actions\AdmissionDocument\DeleteAdmissionDocumentAction;
use App\Actions\AdmissionDocument\UpdateAdmissionDocumentAction;
use App\Data\AdmissionDocument\AdmissionDocumentData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\AdmissionDocuments\AdmissionDocumentResource;
use App\Models\AdmissionDocument;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class EditAdmissionDocument extends EditRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = AdmissionDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->using(fn (AdmissionDocument $record) => app(DeleteAdmissionDocumentAction::class)->handle($record)),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $this->unpackTranslatable($data, $this->record, ['name']);
    }

    protected function handleRecordUpdate(EloquentModel $record, array $data): AdmissionDocument
    {
        $data = $this->packTranslatable($data, ['name']);

        return app(UpdateAdmissionDocumentAction::class)->handle($record, AdmissionDocumentData::from($data));
    }
}
