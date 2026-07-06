<?php

declare(strict_types=1);

namespace App\Actions\SiteSetting;

use App\Data\SiteSetting\SiteSettingData;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Cache;

class UpdateSiteSettingAction
{
    public function handle(SiteSettingData $data): SiteSetting
    {
        $siteSetting = SiteSetting::current();

        $siteSetting->update([
            'site_name' => $data->site_name,
            'site_short_name' => $data->site_short_name,
            'address' => $data->address,
            'footer_description' => $data->footer_description,
            'meta_description' => $data->meta_description,
            'meta_keywords' => $data->meta_keywords,
            'phone_primary' => $data->phone_primary,
            'phone_fax' => $data->phone_fax,
            'email_primary' => $data->email_primary,
            'map_latitude' => $data->map_latitude,
            'map_longitude' => $data->map_longitude,
            'map_embed_url' => $data->map_embed_url,
            'founding_year' => $data->founding_year,
            'theme_color_primary' => $data->theme_color_primary,
            'theme_color_secondary' => $data->theme_color_secondary,
            'theme_color_accent' => $data->theme_color_accent,
            'font_heading' => $data->font_heading,
            'font_body' => $data->font_body,
            'site_logo' => $data->site_logo,
            'site_favicon' => $data->site_favicon,
        ]);

        Cache::forget('site-settings');

        return $siteSetting;
    }
}
