<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatNumbers\Pages;

use App\Actions\StatNumber\CreateStatNumberAction;
use App\Data\StatNumber\StatNumberData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\StatNumbers\StatNumberResource;
use App\Models\StatNumber;
use Filament\Resources\Pages\CreateRecord;

class CreateStatNumber extends CreateRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = StatNumberResource::class;

    protected function handleRecordCreation(array $data): StatNumber
    {
        $data = $this->packTranslatable($data, ['label']);

        return app(CreateStatNumberAction::class)->handle(StatNumberData::from($data));
    }
}
