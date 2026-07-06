<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\AdmissionStepFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AdmissionStep extends Model
{
    /** @use HasFactory<AdmissionStepFactory> */
    use HasFactory, HasTranslations;

    /**
     * @var list<string>
     */
    public array $translatable = ['title', 'description'];

    /**
     * @var list<string>
     */
    protected $fillable = [
        'step_number',
        'icon',
        'title',
        'description',
        'order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'step_number' => 'integer',
            'order' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
