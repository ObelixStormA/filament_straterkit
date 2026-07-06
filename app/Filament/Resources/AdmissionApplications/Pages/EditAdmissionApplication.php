<?php

declare(strict_types=1);

namespace App\Filament\Resources\AdmissionApplications\Pages;

use App\Actions\AdmissionApplication\UpdateAdmissionApplicationStatusAction;
use App\Filament\Resources\AdmissionApplications\AdmissionApplicationResource;
use App\Models\AdmissionApplication;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditAdmissionApplication extends EditRecord
{
    protected static string $resource = AdmissionApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): AdmissionApplication
    {
        return app(UpdateAdmissionApplicationStatusAction::class)->handle($record, $data['status'], auth()->user());
    }
}
