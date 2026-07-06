<?php

declare(strict_types=1);

namespace App\Filament\Resources\AboutValues\Pages;

use App\Actions\AboutValue\CreateAboutValueAction;
use App\Data\AboutValue\AboutValueData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\AboutValues\AboutValueResource;
use App\Models\AboutValue;
use Filament\Resources\Pages\CreateRecord;

class CreateAboutValue extends CreateRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = AboutValueResource::class;

    protected function handleRecordCreation(array $data): AboutValue
    {
        $data = $this->packTranslatable($data, ['title']);

        return app(CreateAboutValueAction::class)->handle(AboutValueData::from($data));
    }
}
