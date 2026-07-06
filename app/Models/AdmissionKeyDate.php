<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\AdmissionKeyDateFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AdmissionKeyDate extends Model
{
    /** @use HasFactory<AdmissionKeyDateFactory> */
    use HasFactory, HasTranslations;

    /**
     * @var list<string>
     */
    public array $translatable = ['title'];

    /**
     * @var list<string>
     */
    protected $fillable = [
        'date_start',
        'date_end',
        'title',
        'order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'date_start' => 'date',
            'date_end' => 'date',
            'order' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
