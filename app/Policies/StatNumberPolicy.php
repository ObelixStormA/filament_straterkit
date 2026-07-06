<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\StatNumber;
use App\Models\User;

class StatNumberPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('stat-number.view');
    }

    public function view(User $user, StatNumber $statNumber): bool
    {
        return $user->can('stat-number.view');
    }

    public function create(User $user): bool
    {
        return $user->can('stat-number.create');
    }

    public function update(User $user, StatNumber $statNumber): bool
    {
        return $user->can('stat-number.update');
    }

    public function delete(User $user, StatNumber $statNumber): bool
    {
        return $user->can('stat-number.delete');
    }
}
