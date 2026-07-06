<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Lab;
use App\Models\User;

class LabPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('lab.view');
    }

    public function view(User $user, Lab $lab): bool
    {
        return $user->can('lab.view');
    }

    public function create(User $user): bool
    {
        return $user->can('lab.create');
    }

    public function update(User $user, Lab $lab): bool
    {
        return $user->can('lab.update');
    }

    public function delete(User $user, Lab $lab): bool
    {
        return $user->can('lab.delete');
    }
}
