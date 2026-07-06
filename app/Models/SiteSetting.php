<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\SiteSettingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class SiteSetting extends Model
{
    /** @use HasFactory<SiteSettingFactory> */
    use HasFactory, HasTranslations;

    /**
     * @var list<string>
     */
    public array $translatable = [
        'site_name',
        'site_short_name',
        'address',
        'footer_description',
        'meta_description',
        'meta_keywords',
    ];

    /**
     * @var list<string>
     */
    protected $fillable = [
        'site_name',
        'site_short_name',
        'address',
        'footer_description',
        'meta_description',
        'meta_keywords',
        'phone_primary',
        'phone_fax',
        'email_primary',
        'map_latitude',
        'map_longitude',
        'map_embed_url',
        'founding_year',
        'theme_color_primary',
        'theme_color_secondary',
        'theme_color_accent',
        'font_heading',
        'font_body',
        'site_logo',
        'site_favicon',
    ];

    protected function casts(): array
    {
        return [
            'map_latitude' => 'decimal:7',
            'map_longitude' => 'decimal:7',
            'founding_year' => 'integer',
        ];
    }

    public static function current(): self
    {
        return static::query()->firstOrCreate(['id' => 1], ['site_name' => []]);
    }
}
