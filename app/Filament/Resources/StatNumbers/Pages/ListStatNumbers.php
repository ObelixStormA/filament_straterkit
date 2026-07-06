<?php

namespace App\Filament\Resources\StatNumbers\Pages;

use App\Filament\Resources\StatNumbers\StatNumberResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStatNumbers extends ListRecords
{
    protected static string $resource = StatNumberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
