<?php

declare(strict_types=1);

namespace App\Filament\Resources\NewsCategories\Pages;

use App\Actions\NewsCategory\DeleteNewsCategoryAction;
use App\Actions\NewsCategory\UpdateNewsCategoryAction;
use App\Data\NewsCategory\NewsCategoryData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\NewsCategories\NewsCategoryResource;
use App\Models\NewsCategory;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class EditNewsCategory extends EditRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = NewsCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->using(fn (NewsCategory $record) => app(DeleteNewsCategoryAction::class)->handle($record)),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $this->unpackTranslatable($data, $this->record, ['name']);
    }

    protected function handleRecordUpdate(EloquentModel $record, array $data): NewsCategory
    {
        $data = $this->packTranslatable($data, ['name']);

        return app(UpdateNewsCategoryAction::class)->handle($record, NewsCategoryData::from($data));
    }
}
