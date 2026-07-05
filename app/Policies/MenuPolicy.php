<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Menu;
use App\Models\User;

class MenuPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('menu.view');
    }

    public function view(User $user, Menu $menu): bool
    {
        return $user->can('menu.view');
    }

    public function create(User $user): bool
    {
        return $user->can('menu.create');
    }

    public function update(User $user, Menu $menu): bool
    {
        return $user->can('menu.update');
    }

    public function delete(User $user, Menu $menu): bool
    {
        return $user->can('menu.delete');
    }
}
