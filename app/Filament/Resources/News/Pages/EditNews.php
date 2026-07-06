<?php

declare(strict_types=1);

namespace App\Filament\Resources\News\Pages;

use App\Actions\News\DeleteNewsAction;
use App\Actions\News\UpdateNewsAction;
use App\Data\News\NewsData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\News\NewsResource;
use App\Models\News;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class EditNews extends EditRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = NewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->using(fn (News $record) => app(DeleteNewsAction::class)->handle($record)),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $this->unpackTranslatable($data, $this->record, ['title', 'short_description', 'content_html', 'meta_title', 'meta_description']);
    }

    protected function handleRecordUpdate(EloquentModel $record, array $data): News
    {
        $data = $this->packTranslatable($data, ['title', 'short_description', 'content_html', 'meta_title', 'meta_description']);

        return app(UpdateNewsAction::class)->handle($record, NewsData::from($data));
    }
}
