<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\AboutSection;
use App\Models\User;

class AboutSectionPolicy
{
    public function view(User $user, AboutSection $aboutSection): bool
    {
        return $user->can('about-section.update');
    }

    public function update(User $user, AboutSection $aboutSection): bool
    {
        return $user->can('about-section.update');
    }
}
