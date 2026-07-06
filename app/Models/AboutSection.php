<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\AboutSectionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AboutSection extends Model
{
    /** @use HasFactory<AboutSectionFactory> */
    use HasFactory, HasTranslations;

    protected $table = 'about_section';

    /**
     * @var list<string>
     */
    public array $translatable = ['title_html', 'description', 'button_text'];

    /**
     * @var list<string>
     */
    protected $fillable = [
        'image',
        'title_html',
        'description',
        'button_text',
    ];

    public static function current(): self
    {
        return static::query()->firstOrCreate(['id' => 1], ['title_html' => []]);
    }
}
