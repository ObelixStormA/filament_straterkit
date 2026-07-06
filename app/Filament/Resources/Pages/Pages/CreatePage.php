<?php

declare(strict_types=1);

namespace App\Filament\Resources\Pages\Pages;

use App\Actions\Page\CreatePageAction;
use App\Data\Page\PageData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\Pages\PageResource;
use App\Models\Page;
use Filament\Resources\Pages\CreateRecord;

class CreatePage extends CreateRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = PageResource::class;

    protected function handleRecordCreation(array $data): Page
    {
        $data = $this->packTranslatable($data, ['title', 'content_html', 'meta_title', 'meta_description']);

        return app(CreatePageAction::class)->handle(PageData::from($data));
    }
}
