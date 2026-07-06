<?php

declare(strict_types=1);

namespace App\Filament\Resources\AdmissionKeyDates\Pages;

use App\Actions\AdmissionKeyDate\DeleteAdmissionKeyDateAction;
use App\Actions\AdmissionKeyDate\UpdateAdmissionKeyDateAction;
use App\Data\AdmissionKeyDate\AdmissionKeyDateData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\AdmissionKeyDates\AdmissionKeyDateResource;
use App\Models\AdmissionKeyDate;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class EditAdmissionKeyDate extends EditRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = AdmissionKeyDateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->using(fn (AdmissionKeyDate $record) => app(DeleteAdmissionKeyDateAction::class)->handle($record)),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $this->unpackTranslatable($data, $this->record, ['title']);
    }

    protected function handleRecordUpdate(EloquentModel $record, array $data): AdmissionKeyDate
    {
        $data = $this->packTranslatable($data, ['title']);

        return app(UpdateAdmissionKeyDateAction::class)->handle($record, AdmissionKeyDateData::from($data));
    }
}
