<?php

declare(strict_types=1);

namespace App\Actions\SocialLink;

use App\Models\SocialLink;

class DeleteSocialLinkAction
{
    public function handle(SocialLink $socialLink): void
    {
        $socialLink->delete();
    }
}
