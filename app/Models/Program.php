<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\ProgramFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Program extends Model
{
    /** @use HasFactory<ProgramFactory> */
    use HasFactory, HasTranslations;

    /**
     * @var list<string>
     */
    public array $translatable = ['name', 'short_description', 'full_description'];

    /**
     * @var list<string>
     */
    protected $fillable = [
        'slug',
        'icon',
        'image',
        'duration_years',
        'degree_type',
        'quota',
        'name',
        'short_description',
        'full_description',
        'order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'duration_years' => 'integer',
            'quota' => 'integer',
            'order' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (self $program): void {
            if (empty($program->slug)) {
                $program->slug = Str::slug($program->getTranslation('name', app()->getLocale()));
            }
        });
    }

    public function admissionApplications(): HasMany
    {
        return $this->hasMany(AdmissionApplication::class);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
