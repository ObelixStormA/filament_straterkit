<?php

declare(strict_types=1);

namespace App\Filament\Resources\HeroSlides\Pages;

use App\Actions\HeroSlide\CreateHeroSlideAction;
use App\Data\HeroSlide\HeroSlideData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\HeroSlides\HeroSlideResource;
use App\Models\HeroSlide;
use Filament\Resources\Pages\CreateRecord;

class CreateHeroSlide extends CreateRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = HeroSlideResource::class;

    protected function handleRecordCreation(array $data): HeroSlide
    {
        $data = $this->packTranslatable($data, ['title', 'subtitle', 'primary_button_text', 'secondary_button_text']);

        return app(CreateHeroSlideAction::class)->handle(HeroSlideData::from($data));
    }
}
