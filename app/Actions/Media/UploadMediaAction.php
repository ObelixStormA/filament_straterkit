<?php

declare(strict_types=1);

namespace App\Actions\Media;

use App\Data\Media\MediaAssetData;
use App\Models\MediaAsset;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class UploadMediaAction
{
    public function handle(MediaAssetData $data, ?int $uploadedByUserId = null): MediaAsset
    {
        return DB::transaction(function () use ($data, $uploadedByUserId): MediaAsset {
            $asset = MediaAsset::query()->create([
                'name' => $data->name,
                'uploaded_by' => $uploadedByUserId,
            ]);

            if ($data->file instanceof UploadedFile) {
                $asset->addMedia($data->file)->toMediaCollection(MediaAsset::FILE_COLLECTION);
            } else {
                $asset->addMediaFromDisk($data->file, 'public')->toMediaCollection(MediaAsset::FILE_COLLECTION);
            }

            return $asset;
        });
    }
}
