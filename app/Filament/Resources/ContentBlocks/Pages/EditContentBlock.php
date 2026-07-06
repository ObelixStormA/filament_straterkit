<?php

declare(strict_types=1);

namespace App\Filament\Resources\ContentBlocks\Pages;

use App\Actions\ContentBlock\DeleteContentBlockAction;
use App\Actions\ContentBlock\UpdateContentBlockAction;
use App\Data\ContentBlock\ContentBlockData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\ContentBlocks\ContentBlockResource;
use App\Models\ContentBlock;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class EditContentBlock extends EditRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = ContentBlockResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->using(fn (ContentBlock $record) => app(DeleteContentBlockAction::class)->handle($record)),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $this->unpackTranslatable($data, $this->record, ['title', 'subtitle', 'button_text']);
    }

    protected function handleRecordUpdate(EloquentModel $record, array $data): ContentBlock
    {
        $data = $this->packTranslatable($data, ['title', 'subtitle', 'button_text']);

        return app(UpdateContentBlockAction::class)->handle($record, ContentBlockData::from($data));
    }
}
