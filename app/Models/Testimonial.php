<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\TestimonialFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Testimonial extends Model
{
    /** @use HasFactory<TestimonialFactory> */
    use HasFactory, HasTranslations;

    /**
     * @var list<string>
     */
    public array $translatable = ['display_name', 'quote_text'];

    /**
     * @var list<string>
     */
    protected $fillable = [
        'photo',
        'person_type',
        'rating',
        'display_name',
        'quote_text',
        'order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'rating' => 'integer',
            'order' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
