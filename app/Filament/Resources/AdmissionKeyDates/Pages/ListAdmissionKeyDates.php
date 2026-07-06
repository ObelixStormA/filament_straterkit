<?php

namespace App\Filament\Resources\AdmissionKeyDates\Pages;

use App\Filament\Resources\AdmissionKeyDates\AdmissionKeyDateResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAdmissionKeyDates extends ListRecords
{
    protected static string $resource = AdmissionKeyDateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
