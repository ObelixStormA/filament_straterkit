<?php

declare(strict_types=1);

namespace App\Filament\Resources\Labs\Pages;

use App\Actions\Lab\CreateLabAction;
use App\Data\Lab\LabData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\Labs\LabResource;
use App\Models\Lab;
use Filament\Resources\Pages\CreateRecord;

class CreateLab extends CreateRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = LabResource::class;

    protected function handleRecordCreation(array $data): Lab
    {
        $data = $this->packTranslatable($data, ['title', 'description']);

        return app(CreateLabAction::class)->handle(LabData::from($data));
    }
}
