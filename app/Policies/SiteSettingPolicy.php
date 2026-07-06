<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\SiteSetting;
use App\Models\User;

class SiteSettingPolicy
{
    public function view(User $user, SiteSetting $siteSetting): bool
    {
        return $user->can('site-setting.update');
    }

    public function update(User $user, SiteSetting $siteSetting): bool
    {
        return $user->can('site-setting.update');
    }
}
