<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\LabFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Lab extends Model
{
    /** @use HasFactory<LabFactory> */
    use HasFactory, HasTranslations;

    /**
     * @var list<string>
     */
    public array $translatable = ['title', 'description'];

    /**
     * @var list<string>
     */
    protected $fillable = [
        'icon',
        'box_size',
        'title',
        'description',
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
