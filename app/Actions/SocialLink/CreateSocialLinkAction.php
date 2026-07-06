<?php

declare(strict_types=1);

namespace App\Actions\SocialLink;

use App\Data\SocialLink\SocialLinkData;
use App\Models\SocialLink;

class CreateSocialLinkAction
{
    public function handle(SocialLinkData $data): SocialLink
    {
        $order = SocialLink::query()->max('order');

        return SocialLink::query()->create([
            'platform' => $data->platform,
            'icon' => $data->icon,
            'url' => $data->url,
            'display_location' => $data->display_location,
            'is_active' => $data->is_active,
            'order' => $order === null ? 0 : $order + 1,
        ]);
    }
}
