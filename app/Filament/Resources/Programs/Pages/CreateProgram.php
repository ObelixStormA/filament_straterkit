<?php

declare(strict_types=1);

namespace App\Filament\Resources\Programs\Pages;

use App\Actions\Program\CreateProgramAction;
use App\Data\Program\ProgramData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\Programs\ProgramResource;
use App\Models\Program;
use Filament\Resources\Pages\CreateRecord;

class CreateProgram extends CreateRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = ProgramResource::class;

    protected function handleRecordCreation(array $data): Program
    {
        $data = $this->packTranslatable($data, ['name', 'short_description', 'full_description']);

        return app(CreateProgramAction::class)->handle(ProgramData::from($data));
    }
}
