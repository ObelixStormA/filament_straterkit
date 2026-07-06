<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\HeroStat;
use App\Models\User;

class HeroStatPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('hero-stat.view');
    }

    public function view(User $user, HeroStat $heroStat): bool
    {
        return $user->can('hero-stat.view');
    }

    public function create(User $user): bool
    {
        return $user->can('hero-stat.create');
    }

    public function update(User $user, HeroStat $heroStat): bool
    {
        return $user->can('hero-stat.update');
    }

    public function delete(User $user, HeroStat $heroStat): bool
    {
        return $user->can('hero-stat.delete');
    }
}
