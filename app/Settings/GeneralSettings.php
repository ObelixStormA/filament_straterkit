<?php

declare(strict_types=1);

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;

    public ?string $site_logo;

    public string $timezone;

    public string $locale;

    public static function group(): string
    {
        return 'general';
    }
}
