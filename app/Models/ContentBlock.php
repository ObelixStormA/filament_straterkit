<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\ContentBlockFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ContentBlock extends Model
{
    /** @use HasFactory<ContentBlockFactory> */
    use HasFactory, HasTranslations;

    /**
     * @var list<string>
     */
    public array $translatable = ['title', 'subtitle', 'button_text'];

    /**
     * @var list<string>
     */
    protected $fillable = [
        'block_key',
        'icon',
        'image',
        'button_url',
        'title',
        'subtitle',
        'button_text',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public static function byKey(string $key): ?self
    {
        return static::query()->where('block_key', $key)->first();
    }
}
