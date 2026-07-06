<?php

declare(strict_types=1);

namespace App\Filament\Resources\Pages\Pages;

use App\Actions\Page\DeletePageAction;
use App\Actions\Page\UpdatePageAction;
use App\Data\Page\PageData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\Pages\PageResource;
use App\Models\Page;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class EditPage extends EditRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->using(fn (Page $record) => app(DeletePageAction::class)->handle($record)),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $this->unpackTranslatable($data, $this->record, ['title', 'content_html', 'meta_title', 'meta_description']);
    }

    protected function handleRecordUpdate(EloquentModel $record, array $data): Page
    {
        $data = $this->packTranslatable($data, ['title', 'content_html', 'meta_title', 'meta_description']);

        return app(UpdatePageAction::class)->handle($record, PageData::from($data));
    }
}
