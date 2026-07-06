<?php

declare(strict_types=1);

namespace App\Filament\Resources\NewsCategories\Pages;

use App\Actions\NewsCategory\CreateNewsCategoryAction;
use App\Data\NewsCategory\NewsCategoryData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\NewsCategories\NewsCategoryResource;
use App\Models\NewsCategory;
use Filament\Resources\Pages\CreateRecord;

class CreateNewsCategory extends CreateRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = NewsCategoryResource::class;

    protected function handleRecordCreation(array $data): NewsCategory
    {
        $data = $this->packTranslatable($data, ['name']);

        return app(CreateNewsCategoryAction::class)->handle(NewsCategoryData::from($data));
    }
}
