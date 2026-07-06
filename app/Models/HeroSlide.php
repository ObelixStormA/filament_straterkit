<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\HeroSlideFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HeroSlide extends Model
{
    /** @use HasFactory<HeroSlideFactory> */
    use HasFactory, HasTranslations;

    /**
     * @var list<string>
     */
    public array $translatable = ['title', 'subtitle', 'primary_button_text', 'secondary_button_text'];

    /**
     * @var list<string>
     */
    protected $fillable = [
        'background_type',
        'background_image',
        'background_video',
        'title',
        'subtitle',
        'primary_button_url',
        'primary_button_text',
        'secondary_button_url',
        'secondary_button_text',
        'order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'order' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
