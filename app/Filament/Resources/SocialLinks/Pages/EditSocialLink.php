<?php

declare(strict_types=1);

namespace App\Filament\Resources\SocialLinks\Pages;

use App\Actions\SocialLink\DeleteSocialLinkAction;
use App\Actions\SocialLink\UpdateSocialLinkAction;
use App\Data\SocialLink\SocialLinkData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\SocialLinks\SocialLinkResource;
use App\Models\SocialLink;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class EditSocialLink extends EditRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = SocialLinkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->using(fn (SocialLink $record) => app(DeleteSocialLinkAction::class)->handle($record)),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $data;
    }

    protected function handleRecordUpdate(EloquentModel $record, array $data): SocialLink
    {
        return app(UpdateSocialLinkAction::class)->handle($record, SocialLinkData::from($data));
    }
}
