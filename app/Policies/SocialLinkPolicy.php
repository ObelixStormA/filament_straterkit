<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\SocialLink;
use App\Models\User;

class SocialLinkPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('social-link.view');
    }

    public function view(User $user, SocialLink $socialLink): bool
    {
        return $user->can('social-link.view');
    }

    public function create(User $user): bool
    {
        return $user->can('social-link.create');
    }

    public function update(User $user, SocialLink $socialLink): bool
    {
        return $user->can('social-link.update');
    }

    public function delete(User $user, SocialLink $socialLink): bool
    {
        return $user->can('social-link.delete');
    }
}
