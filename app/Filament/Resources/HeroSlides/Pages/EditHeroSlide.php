<?php

declare(strict_types=1);

namespace App\Filament\Resources\HeroSlides\Pages;

use App\Actions\HeroSlide\DeleteHeroSlideAction;
use App\Actions\HeroSlide\UpdateHeroSlideAction;
use App\Data\HeroSlide\HeroSlideData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\HeroSlides\HeroSlideResource;
use App\Models\HeroSlide;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditHeroSlide extends EditRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = HeroSlideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->using(fn (HeroSlide $record) => app(DeleteHeroSlideAction::class)->handle($record)),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $this->unpackTranslatable($data, $this->record, ['title', 'subtitle', 'primary_button_text', 'secondary_button_text']);
    }

    protected function handleRecordUpdate(Model $record, array $data): HeroSlide
    {
        $data = $this->packTranslatable($data, ['title', 'subtitle', 'primary_button_text', 'secondary_button_text']);

        return app(UpdateHeroSlideAction::class)->handle($record, HeroSlideData::from($data));
    }
}
