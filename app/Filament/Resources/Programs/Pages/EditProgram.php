<?php

declare(strict_types=1);

namespace App\Filament\Resources\Programs\Pages;

use App\Actions\Program\DeleteProgramAction;
use App\Actions\Program\UpdateProgramAction;
use App\Data\Program\ProgramData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\Programs\ProgramResource;
use App\Models\Program;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class EditProgram extends EditRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = ProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->using(fn (Program $record) => app(DeleteProgramAction::class)->handle($record)),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $this->unpackTranslatable($data, $this->record, ['name', 'short_description', 'full_description']);
    }

    protected function handleRecordUpdate(EloquentModel $record, array $data): Program
    {
        $data = $this->packTranslatable($data, ['name', 'short_description', 'full_description']);

        return app(UpdateProgramAction::class)->handle($record, ProgramData::from($data));
    }
}
