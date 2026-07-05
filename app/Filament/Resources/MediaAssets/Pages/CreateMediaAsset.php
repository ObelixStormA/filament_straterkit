<?php

declare(strict_types=1);

namespace App\Filament\Resources\MediaAssets\Pages;

use App\Actions\Media\UploadMediaAction;
use App\Data\Media\MediaAssetData;
use App\Filament\Resources\MediaAssets\MediaAssetResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateMediaAsset extends CreateRecord
{
    protected static string $resource = MediaAssetResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $assetData = MediaAssetData::from([
            'name' => $data['name'],
            'file' => $data['file'],
        ]);

        return app(UploadMediaAction::class)->handle($assetData, auth()->id());
    }
}
