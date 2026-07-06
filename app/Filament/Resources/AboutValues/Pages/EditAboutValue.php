<?php

declare(strict_types=1);

namespace App\Filament\Resources\AboutValues\Pages;

use App\Actions\AboutValue\DeleteAboutValueAction;
use App\Actions\AboutValue\UpdateAboutValueAction;
use App\Data\AboutValue\AboutValueData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\AboutValues\AboutValueResource;
use App\Models\AboutValue;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class EditAboutValue extends EditRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = AboutValueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->using(fn (AboutValue $record) => app(DeleteAboutValueAction::class)->handle($record)),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $this->unpackTranslatable($data, $this->record, ['title']);
    }

    protected function handleRecordUpdate(EloquentModel $record, array $data): AboutValue
    {
        $data = $this->packTranslatable($data, ['title']);

        return app(UpdateAboutValueAction::class)->handle($record, AboutValueData::from($data));
    }
}
