<?php

declare(strict_types=1);

namespace App\Filament\Resources\AdmissionSteps\Pages;

use App\Actions\AdmissionStep\CreateAdmissionStepAction;
use App\Data\AdmissionStep\AdmissionStepData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\AdmissionSteps\AdmissionStepResource;
use App\Models\AdmissionStep;
use Filament\Resources\Pages\CreateRecord;

class CreateAdmissionStep extends CreateRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = AdmissionStepResource::class;

    protected function handleRecordCreation(array $data): AdmissionStep
    {
        $data = $this->packTranslatable($data, ['title', 'description']);

        return app(CreateAdmissionStepAction::class)->handle(AdmissionStepData::from($data));
    }
}
