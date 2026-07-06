<?php

declare(strict_types=1);

namespace App\Filament\Resources\StatNumbers\Pages;

use App\Actions\StatNumber\DeleteStatNumberAction;
use App\Actions\StatNumber\UpdateStatNumberAction;
use App\Data\StatNumber\StatNumberData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\StatNumbers\StatNumberResource;
use App\Models\StatNumber;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class EditStatNumber extends EditRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = StatNumberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->using(fn (StatNumber $record) => app(DeleteStatNumberAction::class)->handle($record)),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $this->unpackTranslatable($data, $this->record, ['label']);
    }

    protected function handleRecordUpdate(EloquentModel $record, array $data): StatNumber
    {
        $data = $this->packTranslatable($data, ['label']);

        return app(UpdateStatNumberAction::class)->handle($record, StatNumberData::from($data));
    }
}
