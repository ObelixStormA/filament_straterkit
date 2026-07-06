<?php

declare(strict_types=1);

namespace App\Filament\Resources\Publications\Pages;

use App\Actions\Publication\DeletePublicationAction;
use App\Actions\Publication\UpdatePublicationAction;
use App\Data\Publication\PublicationData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\Publications\PublicationResource;
use App\Models\Publication;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class EditPublication extends EditRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = PublicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->using(fn (Publication $record) => app(DeletePublicationAction::class)->handle($record)),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $this->unpackTranslatable($data, $this->record, ['title', 'description']);
    }

    protected function handleRecordUpdate(EloquentModel $record, array $data): Publication
    {
        $data = $this->packTranslatable($data, ['title', 'description']);

        return app(UpdatePublicationAction::class)->handle($record, PublicationData::from($data));
    }
}
