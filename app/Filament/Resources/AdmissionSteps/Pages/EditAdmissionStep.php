<?php

declare(strict_types=1);

namespace App\Filament\Resources\AdmissionSteps\Pages;

use App\Actions\AdmissionStep\DeleteAdmissionStepAction;
use App\Actions\AdmissionStep\UpdateAdmissionStepAction;
use App\Data\AdmissionStep\AdmissionStepData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\AdmissionSteps\AdmissionStepResource;
use App\Models\AdmissionStep;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class EditAdmissionStep extends EditRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = AdmissionStepResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->using(fn (AdmissionStep $record) => app(DeleteAdmissionStepAction::class)->handle($record)),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $this->unpackTranslatable($data, $this->record, ['title', 'description']);
    }

    protected function handleRecordUpdate(EloquentModel $record, array $data): AdmissionStep
    {
        $data = $this->packTranslatable($data, ['title', 'description']);

        return app(UpdateAdmissionStepAction::class)->handle($record, AdmissionStepData::from($data));
    }
}
