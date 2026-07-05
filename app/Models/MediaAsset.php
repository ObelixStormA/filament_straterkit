<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\MediaAssetFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class MediaAsset extends Model implements HasMedia
{
    /** @use HasFactory<MediaAssetFactory> */
    use HasFactory, InteractsWithMedia;

    public const FILE_COLLECTION = 'file';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'uploaded_by',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(self::FILE_COLLECTION)->singleFile();
    }

    public function uploadedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    public function getUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl(self::FILE_COLLECTION) ?: null;
    }

    public function getSizeAttribute(): ?int
    {
        return $this->getFirstMedia(self::FILE_COLLECTION)?->size;
    }

    public function getMimeTypeAttribute(): ?string
    {
        return $this->getFirstMedia(self::FILE_COLLECTION)?->mime_type;
    }
}
