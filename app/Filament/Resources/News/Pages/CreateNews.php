<?php

declare(strict_types=1);

namespace App\Filament\Resources\News\Pages;

use App\Actions\News\CreateNewsAction;
use App\Data\News\NewsData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\News\NewsResource;
use App\Models\News;
use Filament\Resources\Pages\CreateRecord;

class CreateNews extends CreateRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = NewsResource::class;

    protected function handleRecordCreation(array $data): News
    {
        $data = $this->packTranslatable($data, ['title', 'short_description', 'content_html', 'meta_title', 'meta_description']);

        return app(CreateNewsAction::class)->handle(NewsData::from($data));
    }
}
