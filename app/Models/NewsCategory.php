<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\NewsCategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class NewsCategory extends Model
{
    /** @use HasFactory<NewsCategoryFactory> */
    use HasFactory, HasTranslations;

    /**
     * @var list<string>
     */
    public array $translatable = ['name'];

    /**
     * @var list<string>
     */
    protected $fillable = [
        'slug',
        'name',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'order' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (self $category): void {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->getTranslation('name', app()->getLocale()));
            }
        });
    }

    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'category_id');
    }
}
