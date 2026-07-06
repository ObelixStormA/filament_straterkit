<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\SocialLinkFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    /** @use HasFactory<SocialLinkFactory> */
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'platform',
        'icon',
        'url',
        'display_location',
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

    public function scopeLocation(Builder $query, string $location): Builder
    {
        return $query->where('display_location', $location);
    }
}
