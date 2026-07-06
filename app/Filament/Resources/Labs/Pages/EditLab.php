<?php

declare(strict_types=1);

namespace App\Filament\Resources\Labs\Pages;

use App\Actions\Lab\DeleteLabAction;
use App\Actions\Lab\UpdateLabAction;
use App\Data\Lab\LabData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\Labs\LabResource;
use App\Models\Lab;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class EditLab extends EditRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = LabResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->using(fn (Lab $record) => app(DeleteLabAction::class)->handle($record)),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $this->unpackTranslatable($data, $this->record, ['title', 'description']);
    }

    protected function handleRecordUpdate(EloquentModel $record, array $data): Lab
    {
        $data = $this->packTranslatable($data, ['title', 'description']);

        return app(UpdateLabAction::class)->handle($record, LabData::from($data));
    }
}
