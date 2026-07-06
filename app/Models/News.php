<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\NewsFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class News extends Model
{
    /** @use HasFactory<NewsFactory> */
    use HasFactory, HasTranslations;

    /**
     * @var list<string>
     */
    public array $translatable = ['title', 'short_description', 'content_html', 'meta_title', 'meta_description'];

    /**
     * @var list<string>
     */
    protected $fillable = [
        'slug',
        'category_id',
        'cover_image',
        'is_research',
        'is_featured',
        'is_published',
        'author_name',
        'author_id',
        'external_link',
        'file_url',
        'views_count',
        'title',
        'short_description',
        'content_html',
        'meta_title',
        'meta_description',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'is_research' => 'boolean',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'views_count' => 'integer',
            'published_at' => 'datetime',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (self $news): void {
            if (empty($news->slug)) {
                $news->slug = Str::slug($news->getTranslation('title', app()->getLocale()));
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(NewsCategory::class, 'category_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function scopeResearch(Builder $query): Builder
    {
        return $query->where('is_research', true);
    }
}
