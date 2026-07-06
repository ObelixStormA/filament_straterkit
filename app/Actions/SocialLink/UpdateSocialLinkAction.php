<?php

declare(strict_types=1);

namespace App\Actions\SocialLink;

use App\Data\SocialLink\SocialLinkData;
use App\Models\SocialLink;

class UpdateSocialLinkAction
{
    public function handle(SocialLink $socialLink, SocialLinkData $data): SocialLink
    {
        $socialLink->update([
            'platform' => $data->platform,
            'icon' => $data->icon,
            'url' => $data->url,
            'display_location' => $data->display_location,
            'is_active' => $data->is_active,
        ]);

        return $socialLink;
    }
}
