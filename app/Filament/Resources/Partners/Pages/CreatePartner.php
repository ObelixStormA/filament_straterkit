<?php

declare(strict_types=1);

namespace App\Filament\Resources\Partners\Pages;

use App\Actions\Partner\CreatePartnerAction;
use App\Data\Partner\PartnerData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\Partners\PartnerResource;
use App\Models\Partner;
use Filament\Resources\Pages\CreateRecord;

class CreatePartner extends CreateRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = PartnerResource::class;

    protected function handleRecordCreation(array $data): Partner
    {
        return app(CreatePartnerAction::class)->handle(PartnerData::from($data));
    }
}
