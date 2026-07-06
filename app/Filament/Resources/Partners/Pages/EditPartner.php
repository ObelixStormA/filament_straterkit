<?php

declare(strict_types=1);

namespace App\Filament\Resources\Partners\Pages;

use App\Actions\Partner\DeletePartnerAction;
use App\Actions\Partner\UpdatePartnerAction;
use App\Data\Partner\PartnerData;
use App\Filament\Concerns\TransformsTranslatableFields;
use App\Filament\Resources\Partners\PartnerResource;
use App\Models\Partner;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class EditPartner extends EditRecord
{
    use TransformsTranslatableFields;

    protected static string $resource = PartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->using(fn (Partner $record) => app(DeletePartnerAction::class)->handle($record)),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $data;
    }

    protected function handleRecordUpdate(EloquentModel $record, array $data): Partner
    {
        return app(UpdatePartnerAction::class)->handle($record, PartnerData::from($data));
    }
}
