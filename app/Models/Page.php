<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\PageFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    /** @use HasFactory<PageFactory> */
    use HasFactory, HasTranslations;

    /**
     * @var list<string>
     */
    public array $translatable = ['title', 'content_html', 'meta_title', 'meta_description'];

    /**
     * @var list<string>
     */
    protected $fillable = [
        'slug',
        'title',
        'content_html',
        'meta_title',
        'meta_description',
        'image',
        'is_published',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'published_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (self $page): void {
            if (empty($page->slug)) {
                $page->slug = Str::slug($page->getTranslation('title', app()->getLocale()));
            }
        });
    }

    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }
}
