<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\StatNumberFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class StatNumber extends Model
{
    /** @use HasFactory<StatNumberFactory> */
    use HasFactory, HasTranslations;

    /**
     * @var list<string>
     */
    public array $translatable = ['label'];

    /**
     * @var list<string>
     */
    protected $fillable = [
        'icon',
        'number_value',
        'suffix',
        'label',
        'order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'number_value' => 'integer',
            'order' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
