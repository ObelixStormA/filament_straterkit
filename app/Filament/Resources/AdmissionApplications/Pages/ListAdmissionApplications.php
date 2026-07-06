<?php

declare(strict_types=1);

namespace App\Filament\Resources\AdmissionApplications\Pages;

use App\Filament\Resources\AdmissionApplications\AdmissionApplicationResource;
use Filament\Resources\Pages\ListRecords;

class ListAdmissionApplications extends ListRecords
{
    protected static string $resource = AdmissionApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
