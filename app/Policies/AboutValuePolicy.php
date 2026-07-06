<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\AboutValue;
use App\Models\User;

class AboutValuePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('about-value.view');
    }

    public function view(User $user, AboutValue $aboutValue): bool
    {
        return $user->can('about-value.view');
    }

    public function create(User $user): bool
    {
        return $user->can('about-value.create');
    }

    public function update(User $user, AboutValue $aboutValue): bool
    {
        return $user->can('about-value.update');
    }

    public function delete(User $user, AboutValue $aboutValue): bool
    {
        return $user->can('about-value.delete');
    }
}
