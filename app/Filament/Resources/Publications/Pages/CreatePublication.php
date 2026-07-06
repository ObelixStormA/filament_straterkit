<?php

declare(strict_types=1);

namespace App\Filament\Resources\Publications\Pages;

use App\Actions\Publication\CreatePublicationAction;
use App\Data\Publication\PublicationData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\Publications\PublicationResource;
use App\Models\Publication;
use Filament\Resources\Pages\CreateRecord;

class CreatePublication extends CreateRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = PublicationResource::class;

    protected function handleRecordCreation(array $data): Publication
    {
        $data = $this->packTranslatable($data, ['title', 'description']);

        return app(CreatePublicationAction::class)->handle(PublicationData::from($data));
    }
}
