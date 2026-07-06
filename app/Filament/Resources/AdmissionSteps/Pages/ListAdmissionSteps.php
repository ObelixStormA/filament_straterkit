<?php

namespace App\Filament\Resources\AdmissionSteps\Pages;

use App\Filament\Resources\AdmissionSteps\AdmissionStepResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAdmissionSteps extends ListRecords
{
    protected static string $resource = AdmissionStepResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
