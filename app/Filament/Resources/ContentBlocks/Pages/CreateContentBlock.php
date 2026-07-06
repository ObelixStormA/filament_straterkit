<?php

declare(strict_types=1);

namespace App\Filament\Resources\ContentBlocks\Pages;

use App\Actions\ContentBlock\CreateContentBlockAction;
use App\Data\ContentBlock\ContentBlockData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\ContentBlocks\ContentBlockResource;
use App\Models\ContentBlock;
use Filament\Resources\Pages\CreateRecord;

class CreateContentBlock extends CreateRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = ContentBlockResource::class;

    protected function handleRecordCreation(array $data): ContentBlock
    {
        $data = $this->packTranslatable($data, ['title', 'subtitle', 'button_text']);

        return app(CreateContentBlockAction::class)->handle(ContentBlockData::from($data));
    }
}
