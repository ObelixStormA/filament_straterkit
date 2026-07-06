<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\PublicationFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Publication extends Model
{
    /** @use HasFactory<PublicationFactory> */
    use HasFactory, HasTranslations;

    /**
     * @var list<string>
     */
    public array $translatable = ['title', 'description'];

    /**
     * @var list<string>
     */
    protected $fillable = [
        'type',
        'cover_image',
        'year',
        'issue_number',
        'event_type',
        'code_type',
        'code_value',
        'file_url',
        'download_count',
        'title',
        'description',
        'order',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'year' => 'integer',
            'download_count' => 'integer',
            'order' => 'integer',
            'is_published' => 'boolean',
        ];
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)->orderBy('order');
    }

    public function scopeJournals(Builder $query): Builder
    {
        return $query->where('type', 'journal');
    }

    public function scopeCollections(Builder $query): Builder
    {
        return $query->where('type', 'collection');
    }
}
