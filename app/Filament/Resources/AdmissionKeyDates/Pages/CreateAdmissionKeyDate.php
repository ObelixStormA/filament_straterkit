<?php

declare(strict_types=1);

namespace App\Filament\Resources\AdmissionKeyDates\Pages;

use App\Actions\AdmissionKeyDate\CreateAdmissionKeyDateAction;
use App\Data\AdmissionKeyDate\AdmissionKeyDateData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\AdmissionKeyDates\AdmissionKeyDateResource;
use App\Models\AdmissionKeyDate;
use Filament\Resources\Pages\CreateRecord;

class CreateAdmissionKeyDate extends CreateRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = AdmissionKeyDateResource::class;

    protected function handleRecordCreation(array $data): AdmissionKeyDate
    {
        $data = $this->packTranslatable($data, ['title']);

        return app(CreateAdmissionKeyDateAction::class)->handle(AdmissionKeyDateData::from($data));
    }
}
