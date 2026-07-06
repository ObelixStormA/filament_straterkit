<?php

declare(strict_types=1);

namespace App\Filament\Resources\SocialLinks\Pages;

use App\Actions\SocialLink\CreateSocialLinkAction;
use App\Data\SocialLink\SocialLinkData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\SocialLinks\SocialLinkResource;
use App\Models\SocialLink;
use Filament\Resources\Pages\CreateRecord;

class CreateSocialLink extends CreateRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = SocialLinkResource::class;

    protected function handleRecordCreation(array $data): SocialLink
    {
        return app(CreateSocialLinkAction::class)->handle(SocialLinkData::from($data));
    }
}
